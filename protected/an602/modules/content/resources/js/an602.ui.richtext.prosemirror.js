/*
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 * @since 1.8
 */
an602.module('ui.richtext.prosemirror', function(module, require, $) {

    var object = require('util').object;
    var client = require('client');
    var Widget = require('ui.widget').Widget;
    var additions = require('ui.additions');
    var event = require('event');

    var MarkdownEditor = prosemirror.MarkdownEditor;
    var MentionProvider = prosemirror.MentionProvider;

    var RichTextEditor = Widget.extend();

    RichTextEditor.component = 'an602-ui-richtexteditor';

    RichTextEditor.prototype.getDefaultOptions = function() {
        return {
            attributes:  {
                'class': 'atwho-input form-control an602-ui-richtext',
                'data-ui-markdown': true,
            },
            mention: {
                provider: new an602MentionProvider(module.config.mention)
            },
            link: {
              validate: module.config.validate
            },
            emoji: module.config.emoji,
            oembed: module.config.oembed,
            translate: function(key) {
                return module.text(key);
            }
        };
    };

    RichTextEditor.prototype.init = function() {
        if(this.options.placeholder) {
            this.options.placeholder = {
                text: this.options.placeholder,
                'class' : 'placeholder atwho-placeholder'
            };
        }

        if(this.options.disabled) {
            setTimeout($.proxy(this.disable, this), 50);
        }

        //var options = $.extend({}, this.options, {exclude: ['blockquote', 'bullet_list', 'strong', 'code', 'code_block', 'em', 'image', 'list_item', 'ordered_list', 'heading', 'link', 'clipboard']});

        this.editor = new MarkdownEditor(this.$, this.options);
        this.editor.init(this.getInitValue());

        if(this.options.focus) {
            this.editor.view.focus();
        }

        var that = this;
        this.$.on('focusout', function() {
            that.getInput().val(that.editor.serialize()).trigger('blur');
        }).on('clear', function() {
            that.editor.clear();
        }).on('focus', function() {
            that.focus();
        });

        this.$.find('.an602-ui-richtext').on('focus', function() {
            that.focus();
            that.getInput().val(that.editor.serialize()).trigger('blur');
        })

        if (this.options.backupInterval) {
            setInterval(() => this.backup(), this.options.backupInterval * 1000);
            event.on('an602:content:afterSubmit', () => this.resetBackup());
        }
    };

    RichTextEditor.prototype.getInitValue = function() {
        var inputId = this.getInput().attr('id');
        var backup = this.getBackup();

        if (typeof backup[inputId] === 'string' && backup[inputId] !== '') {
            return backup[inputId];
        }

        return this.$.find('[data-ui-richtext]').text();
    }

    RichTextEditor.prototype.getBackup = function() {
        var backup = sessionStorage.getItem(this.options.backupCookieKey);

        if (typeof backup === 'string' && backup !== '') {
            return JSON.parse(backup);
        }

        return {};
    }

    RichTextEditor.prototype.backup = function(currentValue) {
        var inputId = this.getInput().attr('id');
        var isBackuped = typeof this.backupedValue !== 'undefined';

        if (typeof currentValue === 'undefined') {
            currentValue = this.editor.serialize();
        }

        if (!isBackuped && currentValue === '') {
            // Don't back up first empty value
            return;
        }

        if (isBackuped && currentValue === this.backupedValue) {
            // Don't back up same content twice
            return;
        }

        this.backupedValue = currentValue;

        var backup = this.getBackup();
        if (this.backupedValue === '' && typeof backup[inputId] !== 'undefined') {
            delete backup[inputId];
        } else {
            backup[inputId] = this.backupedValue;
        }

        if (Object.keys(backup).length) {
            sessionStorage.setItem(this.options.backupCookieKey, JSON.stringify(backup));
        } else {
            sessionStorage.removeItem(this.options.backupCookieKey);
        }
    };

    RichTextEditor.prototype.resetBackup = function() {
        this.backup('');
    }

    RichTextEditor.prototype.focus = function() {
        this.editor.view.focus();
    };

    RichTextEditor.prototype.disable = function(tooltip) {
        tooltip = tooltip || this.options.disabledText;
        $(this.editor.view.dom).removeAttr('contenteditable').attr({
            disabled: 'disabled',
            title: tooltip,
        }).tooltip({
            placement: 'bottom'
        });
    };

    RichTextEditor.prototype.getInput = function() {
        return $('#'+this.$.attr('id')+'_input');

    };

    var RichText = Widget.extend();

    RichText.component = 'an602-ui-richtext';

    RichText.prototype.init = function() {
        // If in edit mode we do not actually render, we just hold the content
        if(!this.options.edit) {
            this.editor = new MarkdownEditor(this.$, this.options);
            this.$.html(this.editor.render());
            additions.applyTo(this.$, {filter: ['highlightCode']});
            this.$.find('table').wrap('<div class="table-responsive"></div>');
            this.$.trigger('afterRender');
        }

        // See https://github.com/ProseMirror/prosemirror/issues/432
        document.execCommand('enableObjectResizing', false, 'false');
        document.execCommand('enableInlineTableEditing', false, 'false');
    };

    an602MentionProvider = function(options) {
        MentionProvider.call(this, options);
    };

    object.inherits(an602MentionProvider, MentionProvider);

    an602MentionProvider.prototype.find = function(query, node) {
        if(this.xhr) {
            this.xhr.abort();
        }

        var that = this;
        var $editor = Widget.closest(node);

        return new Promise(function(resolve, reject) {
            client.get($editor.options.mentioningUrl, {
                data: {keyword: query},
                beforeSend: function(jqXHR) {
                    that.xhr = jqXHR;
                }
            }).then(function(response) {
                resolve(response.data);
            }).catch(function(err) {
                reject(reject)
            });
        });

    };

    /**
     * Builds mentioning string from container link
     * @param $containerLink
     * @returns {string}
     */
    var buildMentioning = function($containerLink) {
        var username = $containerLink.text();
        var guid = $containerLink.data('guid');
        var url = $containerLink.attr('href');
        return '['+username+'](mention:'+guid+' "'+url+'")';
    };

    module.export({
        initOnPjaxLoad: true,
        unload: function(pjax) {
            $('.an602-richtext-provider').remove();
            $('.ProseMirror-prompt').remove();
        },
        RichTextEditor: RichTextEditor,
        RichText: RichText,
        buildMentioning: buildMentioning,
        api: prosemirror
    });
});

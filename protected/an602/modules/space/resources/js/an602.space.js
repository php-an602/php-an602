/**
 * This module provides an api for handling content objects e.g. Posts, Polls...
 *
 * @type undefined|Function
 */

an602.module('space', function (module, require, $) {
    var client = require('client');
    var additions = require('ui.additions');
    var event = require('event');

    // Current space options (guid, image)
    var options;

    var isSpacePage = function() {
        return $('.space-layout-container').length > 0;
    };

    var setSpace = function(spaceOptions, pjax) {
        if(!module.options || module.options.guid !== spaceOptions.guid) {
            module.options = spaceOptions;
            if(pjax) {
                event.trigger('an602:space:changed', $.extend({}, module.options));
            }
        }
    };

    var guid = function() {
        return (options) ? options.guid : null;
    };

    var archive = function(evt) {
        client.post(evt).then(function(response) {
            if(response.success) {
                additions.switchButtons(evt.$trigger, evt.$trigger.siblings('.unarchive'));
                module.log.success('success.archived');
                event.trigger('an602:space:archived', response.space);
            }
        }).catch(function(err) {
            module.log.error(err, true);
        });
    };

    var unarchive = function(evt) {
        client.post(evt).then(function(response) {
            if(response.success) {
                additions.switchButtons(evt.$trigger, evt.$trigger.siblings('.archive'));
                module.log.success('success.unarchived');

                event.trigger('an602:space:unarchived', response.space);
            }
        }).catch(function(err) {
            module.log.error(err, true);
        });
    };

    var changeVisibilityOption = function(event) {
        const submitButton = event.$trigger.closest('form').find(':submit');

        if (event.$trigger.val() == 0) {
            submitButton.attr('data-action-confirm', submitButton.data('confirm-text'))
        } else {
            submitButton.removeAttr('data-action-confirm')
        }
    };

    var init = function() {
        if(!module.isSpacePage()) {
            module.options = undefined;
        }
    };

    module.export({
        init: init,
        initOnPjaxLoad: true,
        guid: guid,
        archive : archive,
        unarchive : unarchive,
        isSpacePage: isSpacePage,
        setSpace: setSpace,
        changeVisibilityOption: changeVisibilityOption,
    });
});

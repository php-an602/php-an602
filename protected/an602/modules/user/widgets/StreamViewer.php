<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\widgets;

use an602\modules\post\models\Post;
use Yii;
use an602\modules\stream\widgets\StreamViewer as BaseStreamViewer;
use an602\modules\user\models\User;
use an602\modules\post\permissions\CreatePost;

/**
 * StreamViewer shows a users profile stream
 *
 * @since 1.2.4
 * @author Luke
 */
class StreamViewer extends BaseStreamViewer
{

    /**
     * @var string the path to Stream Action to use
     */
    public $streamAction = '/user/profile/stream';

    /**
     * @inheritdoc
     */
    public $streamFilterNavigation = ProfileStreamFilterNavigation::class;

    /**
     * @var User
     */
    public $contentContainer;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $canCreatePost = (new Post($this->contentContainer))->content->canEdit();

        if (empty($this->messageStreamEmptyCss) && $canCreatePost) {
            $this->messageStreamEmptyCss = 'placeholder-empty-stream';
        }

        if ($canCreatePost) {
            $this->messageStreamEmpty = $this->contentContainer->is(Yii::$app->user->getIdentity())
                ? Yii::t('UserModule.profile', '<b>Your profile stream is still empty</b><br>Get started and post something...')
                : Yii::t('UserModule.profile', '<b>This profile stream is still empty</b><br>Be the first and post something...');
        } else {
            $this->messageStreamEmpty = Yii::t('UserModule.profile', '<b>This profile stream is still empty!</b>');
        }
    }

}

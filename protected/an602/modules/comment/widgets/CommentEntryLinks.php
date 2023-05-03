<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\comment\widgets;

use an602\modules\comment\models\Comment;
use an602\modules\like\widgets\LikeLink;
use an602\widgets\BaseStack;

/**
 * CommentEntryControls
 * @since 1.8
 */
class CommentEntryLinks extends BaseStack
{

    /**
     * @var Comment
     */
    public $object = null;

    /**
     * @inheritdoc
     */
    public $seperator = '&nbsp;&middot;&nbsp;';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->initDefaultWidgets();
        parent::init();
    }

    /**
     * Initialize default widgets for Comment links
     */
    function initDefaultWidgets()
    {
        if (!($this->object instanceof Comment)) {
            return;
        }
        $this->addWidget(CommentLink::class, ['object' => $this->object], ['sortOrder' => 100]);
        $this->addWidget(LikeLink::class, ['object' => $this->object], ['sortOrder' => 200]);
    }

}

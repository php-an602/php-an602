<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets\mails;

use an602\components\rendering\Viewable;
use an602\modules\content\interfaces\ContentOwner;

/**
 * MailCommentRow renders a comment row with originator info and image and comment content.
 *
 * @author buddha
 * @since 1.2
 */
class MailCommentEntry extends \yii\base\Widget
{

    /**
     * @var \an602\modules\user\models\User content originator 
     */
    public $originator;

    /**
     * @var \an602\modules\user\models\User notification receiver
     */
    public $receiver;
    
    /**
     * @var string|Viewable|ContentOwner content to render 
     */
    public $comment;
    
    /**
     * @var \an602\modules\space\models\Space space of content (optional)
     */
    public $space;
    
    /** 
     * @var string content date 
     */
    public $date;

    /**
     * @inheritdoc
     */
    public function run()
    {

        return $this->render('mailCommentEntry', [
                    'originator' => $this->originator,
                    'receiver' => $this->receiver,
                    'comment' => $this->comment,
                    'space' => $this->space,
                    'date' => $this->date
        ]);
    }

}

?>
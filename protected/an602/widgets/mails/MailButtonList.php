<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets\mails;

/**
 * MailButtonList renders multiple buttons for email layouts/views.
 *
 * @author buddha
 * @since 1.2
 */
class MailButtonList extends \yii\base\Widget
{

    /**
     * @var string hex color
     */
    public $buttons = [];


    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('mailButtonList', [
                    'buttons' => $this->buttons
        ]);
    }
}

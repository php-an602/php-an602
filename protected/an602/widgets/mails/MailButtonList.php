<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2016 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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

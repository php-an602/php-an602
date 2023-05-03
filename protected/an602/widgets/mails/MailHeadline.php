<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets\mails;

use Yii;

/**
 * Simple headline for mails.
 *
 * @author buddha
 * @since 1.2
 */
class MailHeadline extends \yii\base\Widget
{
    /**
     * @var string button text
     */
    public $text;
    
    /**
     * @var int headline level 1-3
     */
    public $level;
    
    /**
     * @var string optional additional text style
     */
    public $style;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if(!$this->level) {
            $this->level = 1;
        }
        
        return $this->render('mailHeadline', [
                    'text' => $this->text,
                    'level' => $this->level,
                    'style' => $this->style
        ]);
    }

}

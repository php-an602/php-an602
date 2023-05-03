<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets;

/**
 * StatusBar for user feedback (error/warning/info).
 *
 * @see LayoutAddons
 * @author buddha
 * @since 1.2
 */
class StatusBar extends \yii\base\Widget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('statusBar');
    }

}

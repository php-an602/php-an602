<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets;

/**
 * BlueimpGallery gallery layout
 *
 * @see LayoutAddons
 * @author buddha
 * @since 1.2
 */
class BlueimpGallery extends \yii\base\Widget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('blueimpGallery');
    }

}

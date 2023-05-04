<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2016 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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

<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\grid;

use an602\modules\user\widgets\Image as UserImage;

/**
 * ImageColumn
 *
 * @since 1.3
 * @author Luke
 */
class ImageColumn extends BaseColumn
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->options['style'] = 'width:38px';
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        return UserImage::widget(['user' => $this->getUser($model), 'width' => 34]);
    }

}

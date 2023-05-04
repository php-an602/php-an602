<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\widgets;



/**
 * @inheritdoc
 */
class LinkPager extends \yii\widgets\LinkPager
{

    /**
     * @inheritdoc
     */
    public $maxButtonCount = 5;

    /**
     * @inheritdoc
     */
    public $nextPageLabel = '<i class="fa fa-step-forward"></i>';

    /**
     * @inheritdoc
     */
    public $prevPageLabel = '<i class="fa fa-step-backward"></i>';

    /**
     * @inheritdoc
     */
    public $firstPageLabel = '<i class="fa fa-fast-backward"></i>';

    /**
     * @inheritdoc
     */
    public $lastPageLabel = '<i class="fa fa-fast-forward"></i>';

}

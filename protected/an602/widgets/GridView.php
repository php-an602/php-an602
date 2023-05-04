<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\widgets;

/**
 * @inheritdoc
 */
class GridView extends \yii\grid\GridView
{
    /**
     * @inheritdoc
     */
    public $tableOptions = ['class' => 'table table-hover'];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $loaderJs = '$(document).on("ready pjax:success", function () {
                $(".grid-view-loading").show();
                $(".grid-view-loading").css("display", "block !important");
                $(".grid-view-loading").css("opacity", "1 !important");
        });';

        $this->getView()->registerJs($loaderJs);

        return parent::run();
    }
}

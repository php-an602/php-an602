<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets;

use an602\modules\admin\widgets\TrackingWidget;
use an602\modules\tour\widgets\Tour;
use an602\modules\ui\form\widgets\MarkdownModals;
use Yii;

/**
 * LayoutAddons are inserted at the end of all layouts (standard or login).
 *
 * @since 1.1
 * @author Luke
 */
class LayoutAddons extends BaseStack
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!Yii::$app->request->isPjax) {
            $this->addWidget(GlobalModal::class);
            $this->addWidget(GlobalConfirmModal::class);

            if(Yii::$app->params['installed']) {
                $this->addWidget(Tour::class);
                $this->addWidget(TrackingWidget::class);
            }

            $this->addWidget(LoaderWidget::class, ['show' => false, 'id' => "an602-ui-loader-default"]);
            $this->addWidget(StatusBar::class);
            if (Yii::$app->params['installed']) {

                $this->addWidget(BlueimpGallery::class);
                $this->addWidget(MarkdownModals::class);

                if (Yii::$app->params['enablePjax']) {
                    $this->addWidget(Pjax::class);
                }
            }
        }
        parent::init();
    }

}

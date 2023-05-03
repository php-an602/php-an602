<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\widgets;

use an602\modules\web\security\helpers\Security;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Yii;

/**
 * TrackingWidget adds statistic tracking code to all layouts
 *
 * @since 1.1
 * @author Luke
 */
class TrackingWidget extends \an602\components\Widget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        $trackingCode = Yii::$app->settings->get('trackingHtmlCode');

        if(!$trackingCode) {
            return '';
        }

        $twig = new Environment(new ArrayLoader(['trackingHtmlCode' => $trackingCode]));
        return $twig->render('trackingHtmlCode', ['nonce' => Security::getNonce()]);
    }

}

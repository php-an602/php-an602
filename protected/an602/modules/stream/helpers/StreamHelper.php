<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\stream\helpers;


use an602\modules\content\components\ContentContainerActiveRecord;
use an602\modules\space\models\Space;
use an602\modules\user\models\User;
use yii\helpers\Url;

class StreamHelper
{
    /**
     * @param ContentContainerActiveRecord $container
     * @param array $options
     * @since 1.3
     */
    public static function createUrl(ContentContainerActiveRecord $container, $options = []) {
        if($container instanceof Space) {
            return $container->createUrl('/space/space/home', $options);
        } elseif($container instanceof User) {
            return $container->createUrl('/user/profile/home', $options);
        }
    }
}

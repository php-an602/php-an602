<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\installer;

use yii\db\Connection;

/**
 * Events provides callbacks to handle events.
 */
class Events extends \yii\base\BaseObject
{

    public static function onConnectionAfterOpen($event)
    {
        /* @var $connection Connection */
        $connection = $event->sender;

        if (in_array($connection->getDriverName(), ['mysql', 'mysqli'], true)) {
            $connection->pdo->exec('SET default_storage_engine = InnoDB');
        }
    }

}

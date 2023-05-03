<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.an602.org/licences
 */

use an602\components\Migration;

class m150924_133344_update_notification_fix extends Migration
{
    public function up()
    {
        $this->update('notification', ['class' => 'an602\modules\admin\notifications\NewVersionAvailable'], ['class' => 'An602UpdateNotification']);
    }

    public function down()
    {
        echo "m150924_133344_update_notification_fix cannot be reverted.\n";

        return false;
    }
}

<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.an602.org/licences
 */

use an602\components\Migration;

class m150924_133344_update_notification_fix extends Migration
{
    public function up()
    {
        $this->update('notification', ['class' => 'an602\modules\admin\notifications\NewVersionAvailable'], ['class' => 'an602UpdateNotification']);
    }

    public function down()
    {
        echo "m150924_133344_update_notification_fix cannot be reverted.\n";

        return false;
    }
}

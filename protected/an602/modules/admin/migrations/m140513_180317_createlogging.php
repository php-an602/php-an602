<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.an602.org/licences
 */

use yii\db\Migration;

class m140513_180317_createlogging extends Migration
{
    public function up()
    {
        $this->createTable('logging', [
            'id' => 'pk',
            'level' => 'varchar(128)',
            'category' => 'varchar(128)',
            'logtime' => 'integer',
            'message' => 'text',
        ]);
    }

    public function down()
    {
        echo "m140513_180317_createlogging does not support migration down.\n";

        return false;
    }
}

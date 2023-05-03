<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.an602.org/licences
 */

use an602\components\Migration;

class m140704_080659_installationid extends Migration
{
    public function up()
    {
        if (!$this->isInitialInstallation()) {
            $this->insert('setting', [
                'name' => 'installationId',
                'value' => md5(uniqid("", true)),
                'module_id' => 'admin'
            ]);
        }
    }

    public function down()
    {
        echo "m140704_080659_installationid does not support migration down.\n";

        return false;
    }
}
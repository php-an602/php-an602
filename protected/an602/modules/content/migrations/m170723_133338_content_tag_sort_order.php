<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

use yii\db\Migration;

class m170723_133338_content_tag_sort_order extends Migration
{
    public function safeUp()
    {
        $this->addColumn('content_tag',  'sort_order', 'int(11) DEFAULT 0');
    }

    public function safeDown()
    {
        echo "m170723_133337_content_filter cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170723_133337_content_filter cannot be reverted.\n";

        return false;
    }
    */
}

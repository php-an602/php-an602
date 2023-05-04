<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 *
 */

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 23.07.2017
 * Time: 21:38
 */

namespace an602\modules\content\models;


use yii\db\ActiveRecord;

/**
 * Class ContentTagAddition
 *
 * @property integer $id
 * @perperty integer $tag_id
 *
 * @since 1.2.2
 * @author buddha
 */
class ContentTagAddition extends ActiveRecord
{
    public function setTag(ContentTag $tag)
    {
        $this->tag_id = $tag->id;
    }
}

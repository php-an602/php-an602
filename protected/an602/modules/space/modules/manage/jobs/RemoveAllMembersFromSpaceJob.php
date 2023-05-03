<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\modules\manage\jobs;

use an602\modules\queue\ActiveJob;
use an602\modules\space\models\Membership;
use an602\modules\space\models\Space;
use yii\db\StaleObjectException;

class RemoveAllMembersFromSpaceJob extends ActiveJob
{
    /**
     * @var Space target space
     */
    private $space;

    /**
     * @var int
     */
    public $spaceId;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->space = Space::findOne(['id' => $this->spaceId]);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach (Membership::findAll(['space_id' => $this->space->id, 'group_id' => [Space::USERGROUP_MEMBER, Space::USERGROUP_USER, Space::USERGROUP_GUEST]]) as $spaceMembership) {
            try {
                $spaceMembership->delete();
            } catch (StaleObjectException|\Exception $e) {
            }
        }
    }
}

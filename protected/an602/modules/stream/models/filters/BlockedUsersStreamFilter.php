<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\stream\models\filters;

use an602\modules\user\models\User;

class BlockedUsersStreamFilter extends StreamQueryFilter
{
    /**
     * @var array IDs of the blocked users for the current User
     */
    private $blockedUsers;

    public function init() {
        parent::init();

        if (!empty($this->streamQuery->user) && $this->streamQuery->user instanceof User) {
            $this->blockedUsers = $this->streamQuery->user->getBlockedUserIds();
        }
    }

    public function apply()
    {
        if (empty($this->blockedUsers)) {
            return;
        }

        $this->query->andWhere(['NOT IN', 'user.id', $this->blockedUsers]);
    }
}

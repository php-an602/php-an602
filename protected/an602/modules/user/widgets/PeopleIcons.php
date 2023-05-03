<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\widgets;

use an602\components\Widget;
use an602\modules\user\models\User;

/**
 * PeopleIcons shows footer icons for people cards
 * 
 * @since 1.9
 * @author Luke
 */
class PeopleIcons extends Widget
{

    /**
     * @var User
     */
    public $user;

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('peopleIcons', [
            'user' => $this->user
        ]);
    }

}

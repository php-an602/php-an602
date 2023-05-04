<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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

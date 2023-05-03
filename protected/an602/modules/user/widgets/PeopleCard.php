<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\widgets;

use an602\components\Widget;
use an602\modules\admin\models\forms\PeopleSettingsForm;
use an602\modules\user\models\User;

/**
 * PeopleActionsButton shows directory options (following or friendship) for listed users
 * 
 * @since 1.9
 * @author Luke
 */
class PeopleCard extends Widget
{

    /**
     * @var User
     */
    public $user;

    /**
     * @var string HTML wrapper around card
     */
    public $template = '<div class="card card-people col-lg-3 col-md-4 col-sm-6 col-xs-12">{card}</div>';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $card = $this->render('peopleCard', [
            'user' => $this->user
        ]);

        return str_replace('{card}', $card, $this->template);
    }

    public static function config($name): string
    {
        $peopleSettingsForm = new PeopleSettingsForm();

        return isset($peopleSettingsForm->$name) ? $peopleSettingsForm->$name : '';
    }

}

<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\widgets;

use an602\components\Widget;
use an602\modules\space\models\Space;

/**
 * SpaceDirectoryActionButtons shows space directory buttons (following and membership)
 * 
 * @since 1.9
 * @author Luke
 */
class SpaceDirectoryActionButtons extends Widget
{

    /**
     * @var Space
     */
    public $space;

    /**
     * @var string Template for buttons
     */
    public $template = '{buttons}';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $html = FollowButton::widget([
            'space' => $this->space,
        ]);

        $html .= MembershipButton::widget([
            'space' => $this->space,
            'options' => [
                'requestMembership' => ['attrs' => ['class' => 'btn btn-info btn-sm']],
                'becomeMember' => ['attrs' => ['class' => 'btn btn-info btn-sm']],
                'acceptInvite' => ['attrs' => ['class' => 'btn btn-info btn-sm'], 'togglerClass' => 'btn btn-info btn-sm'],
                'cancelPendingMembership' => ['attrs' => ['class' => 'btn btn-info btn-sm active']],
                'cancelMembership' => ['visible' => true, 'attrs' => ['class' => 'btn btn-info btn-sm active']],
                'cannotCancelMembership' => ['visible' => true, 'attrs' => ['class' => 'btn btn-info btn-sm active']],
            ],
        ]);

        if (trim($html) === '') {
            return '';
        }

        return str_replace('{buttons}', $html, $this->template);
    }

}

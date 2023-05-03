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
 * SpaceDirectoryCard shows a space on spaces directory
 * 
 * @since 1.9
 * @author Luke
 */
class SpaceDirectoryCard extends Widget
{

    /**
     * @var Space
     */
    public $space;

    /**
     * @var string HTML wrapper around card
     */
    public $template = '<div class="card card-space col-lg-3 col-md-4 col-sm-6 col-xs-12">{card}</div>';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $card = $this->render('spaceDirectoryCard', [
            'space' => $this->space
        ]);

        return str_replace('{card}', $card, $this->template);
    }

}

<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\widgets;

use an602\components\Widget;
use an602\modules\space\models\Space;
use Yii;

/**
 * SpaceDirectoryStatus shows status like "Archived" for spaces cards
 * 
 * @since 1.10
 * @author Luke
 */
class SpaceDirectoryStatus extends Widget
{

    /**
     * @var Space
     */
    public $space;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->space->isArchived()) {
            return $this->render('spaceDirectoryStatus', [
                'class' => 'label label-primary',
                'text' => Yii::t('SpaceModule.base', 'Archived'),
            ]);
        }
    }

}

<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\widgets;

use an602\components\Widget;
use Yii;

/**
 * MaintenanceModeWarning shows a snippet in the dashboard
 * when maintenance mode is active.
 *
 * @package an602\modules\admin\widgets
 */
class MaintenanceModeWarning extends Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if (!Yii::$app->settings->get('maintenanceMode')) {
            return;
        }

        return $this->render('maintenanceModeWarning');
    }

}

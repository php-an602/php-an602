<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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

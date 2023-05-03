<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2019 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\marketplace\controllers;

use an602\modules\admin\components\Controller;
use an602\modules\admin\libs\An602API;
use an602\modules\admin\permissions\ManageModules;
use an602\modules\marketplace\Module;
use Yii;

/**
 * Class PurchaseController
 *
 * @property Module $module
 * @package an602\modules\marketplace\controllers
 */
class PurchaseController extends Controller
{

    /**
     * @var string
     */
    public $defaultAction = 'list';

    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            ['permissions' => ManageModules::class]
        ];
    }

    /**
     * Complete list of all modules
     */
    public function actionList()
    {
        $hasError = false;
        $message = '';

        $licenceKey = Yii::$app->request->post('licenceKey', '');

        if ($licenceKey !== '') {
            $result = An602API::request('v1/modules/registerPaid', ['licenceKey' => $licenceKey]);
            if (!isset($result['status'])) {
                $hasError = true;
                $message = 'Could not connect to An602 API!';
            } elseif ($result['status'] == 'ok' || $result['status'] == 'created') {
                $message = 'Module licence added!';
                $licenceKey = '';
            } else {
                $hasError = true;
                $message = 'Invalid module licence key!';
            }
        }

        // Only showed purchased modules
        $onlineModules = $this->module->onlineModuleManager;
        $modules = $onlineModules->getModules(false);

        foreach ($modules as $i => $module) {
            if (!isset($module['purchased']) || !$module['purchased']) {
                unset($modules[$i]);
            }
        }

        return $this->renderAjax('list', [
            'modules' => $modules,
            'licenceKey' => $licenceKey,
            'hasError' => $hasError,
            'message' => $message,
        ]);
    }

}

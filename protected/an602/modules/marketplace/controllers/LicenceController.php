<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2019 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\marketplace\controllers;

use an602\modules\admin\components\Controller;
use an602\modules\marketplace\components\LicenceManager;
use an602\modules\marketplace\Module;
use Yii;

/**
 * Licence controller
 *
 * @property Module $module
 * @package an602\modules\marketplace\controllers
 */
class LicenceController extends Controller
{

    public function actionIndex()
    {
        $model = $this->module->getLicence();

        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            LicenceManager::fetch();
            return $this->redirect(['index']);
        }

        return $this->render('index', ['model' => $model]);
    }


    public function actionRemove()
    {
        LicenceManager::remove();
        return $this->redirect(['/marketplace/licence']);
    }


}

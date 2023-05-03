<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\activity\controllers;

use an602\modules\admin\components\Controller;
use an602\modules\admin\permissions\ManageSettings;
use an602\modules\admin\permissions\ManageUsers;
use an602\modules\activity\models\MailSummaryForm;
use Yii;

/**
 * AdminController is for system administrators to set activity e-mail defaults.
 *
 * @since 1.2
 * @author Luke
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            ['permissions' => ManageSettings::class],
            ['permissions' => [ManageUsers::class], 'actions' => ['reset-all-users']],
        ];
    }

    public function actionDefaults()
    {
        $this->subLayout = '@admin/views/layouts/setting';
        $model = new MailSummaryForm();

        $model->loadCurrent();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->view->saved();
        }

        return $this->render('defaults', [
            'model' => $model
        ]);
    }

    /**
     * Resets the overwritten settings of all users to the system defaults
     */
    public function actionResetAllUsers()
    {
        $this->forcePostRequest();
        $model = new MailSummaryForm();
        $model->resetAllUserSettings();

        $this->view->saved();
        $this->redirect(['defaults']);
    }

}

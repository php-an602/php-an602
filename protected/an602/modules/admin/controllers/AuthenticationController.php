<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\controllers;

use an602\modules\admin\components\Controller;
use an602\modules\admin\models\forms\AuthenticationSettingsForm;
use an602\modules\admin\permissions\ManageSettings;
use an602\modules\user\models\Group;
use Yii;
use yii\helpers\Html;

/**
 * ApprovalController handels new user approvals
 */
class AuthenticationController extends Controller
{

    /**
     * @inheritdoc
     */
    public $adminOnly = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setActionTitles([
            'basic' => Yii::t('AdminModule.base', 'Basic'),
            'authentication' => Yii::t('AdminModule.base', 'Authentication'),
            'authentication-ldap' => Yii::t('AdminModule.base', 'Authentication')
        ]);

        $this->subLayout = '@admin/views/layouts/user';

        return parent::init();
    }

    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            ['permissions' => ManageSettings::class]
        ];
    }

    /**
     * Returns a List of Users
     * @return string
     */
    public function actionIndex()
    {
        $form = new AuthenticationSettingsForm;
        if ($form->load(Yii::$app->request->post()) && $form->validate() && $form->save()) {
            $this->view->saved();
        }

        return $this->render('authentication', ['model' => $form]);
    }
}

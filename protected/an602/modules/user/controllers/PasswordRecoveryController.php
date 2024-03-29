<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\controllers;

use an602\components\access\ControllerAccess;
use an602\modules\user\Module as UserModule;
use Yii;
use yii\web\HttpException;
use an602\components\Controller;
use an602\modules\user\models\User;
use an602\modules\user\models\Password;
use an602\modules\user\models\forms\AccountRecoverPassword;
use yii\web\NotFoundHttpException;

/**
 * Password Recovery
 *
 * @since 1.1
 */
class PasswordRecoveryController extends Controller
{

    /**
     * @inheritdoc
     */
    public $layout = "@an602/modules/user/views/layouts/main";

    /**
     * Allow guest access independently from guest mode setting.
     *
     * @var string
     */
    public $access = ControllerAccess::class;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ]
        ];
    }

    public function beforeAction($action)
    {
        /** @var UserModule $userModule */
        $userModule = Yii::$app->getModule('user');

        if (!$userModule->passwordRecoveryRoute) {
            throw new NotFoundHttpException();
        }

        return parent::beforeAction($action);
    }

    /**
     * Recover Password Action
     * Generates an password reset token and sends an e-mail to the user.
     */
    public function actionIndex()
    {
        $model = new AccountRecoverPassword();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->recover()) {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('success_modal', ['model' => $model]);
            }
            return $this->render('success', ['model' => $model]);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('index_modal', ['model' => $model]);
        }
        return $this->render('index', ['model' => $model]);
    }

    /**
     * Resets users password based on given token
     */
    public function actionReset()
    {
        $user = User::findOne(['guid' => Yii::$app->request->get('guid')]);

        if ($user === null || !$this->checkPasswordResetToken($user, Yii::$app->request->get('token'))) {
            throw new HttpException('404', 'It looks like you clicked on an invalid password reset link. Please try again.');
        }

        $model = new Password();
        $model->scenario = 'registration';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = $user->id;
            $model->setPassword($model->newPassword);

            if ($model->save()) {
                Yii::$app->getModule('user')->settings->contentContainer($user)->delete('passwordRecoveryToken');
                return $this->render('reset_success');
            }
        }

        return $this->render('reset', ['model' => $model]);
    }

    private function checkPasswordResetToken($user, $token)
    {
        // Saved token - Format: randomToken.generationTime
        $savedTokenInfo = Yii::$app->getModule('user')->settings->contentContainer($user)->get('passwordRecoveryToken');

        if ($savedTokenInfo) {
            list($generatedToken, $generationTime) = explode('.', $savedTokenInfo);
            if (\an602\libs\Helpers::same($generatedToken, $token)) {
                // Check token generation time
                if ($generationTime + (24 * 60 * 60) >= time()) {
                    return true;
                }
            }
        }

        return false;
    }

}

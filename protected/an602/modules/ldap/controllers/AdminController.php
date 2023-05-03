<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2019 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ldap\controllers;


use Exception;
use an602\components\SettingsManager;
use an602\modules\admin\components\Controller;
use an602\modules\ldap\models\LdapSettings;
use an602\modules\user\authclient\LdapAuth;
use Yii;
use Laminas\Ldap\Exception\LdapException;
use Laminas\Ldap\Ldap;


/**
 * Class AdminController
 * @package an602\modules\ldap\controllers
 */
class AdminController extends Controller
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->subLayout = '@admin/views/layouts/user';
        parent::init();
    }


    /**
     * Configure Ldap authentication
     *
     * @return string
     */
    public function actionIndex()
    {
        $settings = new LdapSettings();
        $settings->loadSaved();
        if ($settings->load(Yii::$app->request->post()) && $settings->validate() && $settings->save()) {
            $this->view->saved();
            return $this->redirect(['/ldap/admin']);
        }

        $enabled = false;
        $userCount = 0;
        $errorMessage = "";

        if ($settings->enabled) {
            $enabled = true;
            try {
                /** @var \an602\modules\ldap\authclient\LdapAuth $ldapAuthClient */
                $ldapAuthClient = Yii::createObject($settings->getLdapAuthDefinition());
                $ldap = $ldapAuthClient->getLdap();
                $userCount = $ldap->count($settings->userFilter, $settings->baseDn, Ldap::SEARCH_SCOPE_SUB);
            } catch (LdapException $ex) {
                $errorMessage = $ex->getMessage();
            } catch (Exception $ex) {
                $errorMessage = $ex->getMessage();
            }
        }

        return $this->render('index', [
            'model' => $settings,
            'enabled' => $enabled,
            'userCount' => $userCount,
            'errorMessage' => $errorMessage
        ]);
    }

}

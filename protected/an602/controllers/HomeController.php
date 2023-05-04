<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\controllers;

use yii\helpers\Url;
use an602\components\Controller;

/**
 * HomeController redirects to the home page
 *
 * @author luke
 * @since 1.2
 */
class HomeController extends Controller
{

    /**
     * Redirects to the home controller/action
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(Url::home());
    }
}

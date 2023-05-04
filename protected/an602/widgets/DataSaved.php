<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\widgets;

/**
 * DataSavedWidget shows an flash message after saving
 *
 * @deprecated since 1.2 use \an602\modules\ui\view\components\View::saved
 * @package an602.widgets
 * @since 0.5
 * @author Andreas Strobel
 */
class DataSaved extends \yii\base\Widget
{

    /**
     * Displays / Run the Widget
     */
    public function run()
    {
        return $this->render('dataSaved', []);
    }

}

<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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

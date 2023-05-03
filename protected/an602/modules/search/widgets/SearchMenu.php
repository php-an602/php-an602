<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\search\widgets;

use yii\base\Widget;

/**
 * SearchMenu Widget for TopMenu
 */
class SearchMenu extends Widget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('searchMenu', []);
    }

}

<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\components\bootstrap;

use yii\base\BootstrapInterface;

/**
 * LanguageSelector automatically sets the language of the i18n component
 *
 * @see \an602\components\i18n\I18N
 * @author luke
 */
class LanguageSelector implements BootstrapInterface
{

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        mb_internal_encoding('UTF-8');

        $app->i18n->autosetLocale();
    }
}

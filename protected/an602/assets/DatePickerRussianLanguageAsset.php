<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * Fixes https://github.com/php-an602/php-an602/issues/4638 by aligning jui and icu month short names
 *
 * @author buddha
 * @since 1.7.1
 */
class DatePickerRussianLanguageAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $basePath = '@webroot-static';

    /**
     * @inheritdoc
     */
    public $baseUrl = '@web-static';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/compat/date/i18n/datepicker-ru.js',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];

}

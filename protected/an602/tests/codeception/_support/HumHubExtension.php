<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 *
 */

namespace tests\codeception\_support;

use Codeception\Events;

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 31.07.2017
 * Time: 23:22
 */
class an602Extension extends \Codeception\Extension
{
    public static $events = [
        Events::MODULE_INIT  => 'moduleInit',
        #Events::STEP_BEFORE => 'beforeStep',
        #Events::TEST_FAIL => 'testFailed',
        #Events::RESULT_PRINT_AFTER => 'print',
    ];

    public function moduleInit($test) {
        $GLOBALS['env'] = $this->options['env'];
    }

}

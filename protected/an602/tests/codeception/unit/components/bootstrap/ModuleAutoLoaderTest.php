<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\tests\codeception\unit;

use Codeception\Test\Unit;
use an602\components\bootstrap\ModuleAutoLoader;
use Yii;

/**
 * Class ModuleAutoLoaderTest
 */
class ModuleAutoLoaderTest extends Unit
{
    /** @var array list of expected core modules */
    const EXPECTED_CORE_MODULES = [
        'activity',
        'admin',
        'comment',
        'content',
        'dashboard',
        'file',
        'friendship',
        'installer',
        'ldap',
        'like',
        'live',
        'marketplace',
        'notification',
        'post',
        'queue',
        'search',
        'space',
        'stream',
        'topic',
        'tour',
        'ui',
        'user',
        'web'
    ];

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * Assert that locateModules find all core modules
     */
    public function testCoreModuleLoading()
    {
        $modules = array_column(
            ModuleAutoLoader::locateModules(),
            'id'
        );

        /* assert that every core module is found by module loader. expected result of array_diff is an empty array. */
        $this->assertEmpty(array_diff(self::EXPECTED_CORE_MODULES, $modules), 'expected core modules are not resolved by auto loader.');
    }

    /**
     * Test that an invalid path for module loading leads to an exception
     */
    public function testInvalidModulePath()
    {
        array_push(Yii::$app->params['moduleAutoloadPaths'], '/dev/null');

        try {
            ModuleAutoLoader::locateModules();
            $this->fail('no expection when invalid path for moduleAutoloadPaths');
        } catch (\ErrorException $e) {
        }

        array_pop(Yii::$app->params['moduleAutoloadPaths']);
    }


    /**
     * Return test cases for module loading by path
     * @return array
     */
    public function dataModuleLoadingByPath()
    {
        return [
            ['@an602/modules', count(self::EXPECTED_CORE_MODULES)],
            ['@an602/invalid', 0],
            ['@invalid/folder', 0]
        ];
    }
}

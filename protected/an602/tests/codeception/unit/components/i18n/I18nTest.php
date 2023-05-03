<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\tests\codeception\unit;

use Yii;
use tests\codeception\_support\An602DbTestCase;

class I18nTest extends An602DbTestCase
{
    public $fixtureConfig = [
        'default'
    ];

    public function testShowMeridian()
    {
        $this->becomeUser('Admin');
        $this->assertEquals('UTC', Yii::$app->formatter->timeZone);
        $this->assertEquals('en-US', Yii::$app->formatter->locale);
        $this->assertTrue(Yii::$app->formatter->isShowMeridiem());

        Yii::$app->formatter->locale = 'de';

        $this->assertFalse(Yii::$app->formatter->isShowMeridiem());

        Yii::$app->i18n->autosetLocale();
        $this->assertEquals('UTC', Yii::$app->formatter->timeZone);
        $this->assertEquals('en-US', Yii::$app->formatter->locale);
    }

    public function testChangeLocale()
    {
        $this->becomeUser('Admin');
        $this->assertEquals('UTC', Yii::$app->formatter->timeZone);
        $this->assertEquals('en-US', Yii::$app->formatter->locale);

        $user = Yii::$app->user->getIdentity()->language = 'de';
        Yii::$app->i18n->autosetLocale();

        $this->assertEquals('de', Yii::$app->formatter->locale);
        $this->assertEquals('de', Yii::$app->language);
    }
}

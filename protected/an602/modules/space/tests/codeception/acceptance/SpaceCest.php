<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace space\acceptance;

use space\AcceptanceTester;

class SpaceCest
{
    public function testHomePageUrl(AcceptanceTester $I)
    {
        $I->wantTo('ensure that space home page URL alias routed as expected.');

        $I->amAdmin();
        $I->amOnPage('/s/space-1/space/space/home');

        $I->waitForText('Stream');
        $I->click('Stream');
        $I->waitForText('Space menu');
        $I->see('Space 1');
        $I->see('Stream');

        $I->expectTo('see the alias of space home page URL');
        $I->seeCurrentUrlEquals('/s/space-1/home');
    }

    public function testAboutPageUrl(AcceptanceTester $I)
    {
        $I->wantTo('ensure that space about page URL alias routed as expected.');

        $I->amAdmin();
        $I->amOnPage('/s/space-1/space/space/home');

        $I->waitForText('Stream');
        $I->click('About');
        $I->waitForText('Space menu');
        $I->see('Space 1');
        $I->see('About');

        $I->expectTo('see the alias of space about page URL');
        $I->seeCurrentUrlEquals('/s/space-1/about');
    }
}

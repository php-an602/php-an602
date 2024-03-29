<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 *
 */

namespace tests\codeception\unit\modules\content\widgets;

use an602\models\UrlOembed;
use an602\modules\content\widgets\richtext\extensions\oembed\OembedExtension;
use tests\codeception\_support\an602DbTestCase;


class RichTextOembedTest extends an602DbTestCase
{
    /*
     * Links
     */

    public function _before()
    {
        parent::_before();

    }

    public function testScanSingleOembed()
    {
        $result = OembedExtension::scanLinkExtension('[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)');
        static::assertCount(1, $result);
        static::assertEquals($result[0]->getExtensionId(), 'https://www.youtube.com/watch?v=yt1');
    }

    public function testLoadOembed()
    {
        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt1',
            'preview' => 'yt1'
        ]))->save());

        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt2',
            'preview' => 'yt2'
        ]))->save());

        $result = OembedExtension::scanLinkExtension('[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)');
        $oembed = UrlOembed::getOEmbed($result[0]->getExtensionId());
        static::assertNotNull($oembed);
        static::assertEquals($oembed, 'yt1');
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testParseSingleOembed()
    {
        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt1',
            'preview' => 'yt1'
        ]))->save());

        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt2',
            'preview' => 'yt2'
        ]))->save());

        $text = "[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)";
        $oembeds = OembedExtension::parseOembeds($text);
        static::assertCount(1, $oembeds);
        static::assertEquals('yt1', $oembeds['https://www.youtube.com/watch?v=yt1']);
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testParseMultipleOembeds()
    {
        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt1',
            'preview' => 'yt1'
        ]))->save());

        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt2',
            'preview' => 'yt2'
        ]))->save());

        $text = "[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)\n\n[https://www.youtube.com/watch?v=yt2](oembed:https://www.youtube.com/watch?v=yt2)";
        $oembeds = OembedExtension::parseOembeds($text);
        static::assertCount(2, $oembeds);
        static::assertEquals('yt1', $oembeds['https://www.youtube.com/watch?v=yt1']);
        static::assertEquals('yt2', $oembeds['https://www.youtube.com/watch?v=yt2']);
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testParseOembedsWithMax()
    {
        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt1',
            'preview' => 'yt1'
        ]))->save());

        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt2',
            'preview' => 'yt2'
        ]))->save());

        $text = "[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)\n\n[https://www.youtube.com/watch?v=yt2](oembed:https://www.youtube.com/watch?v=yt2)";
        $oembeds = OembedExtension::parseOembeds($text, 1);
        static::assertCount(1, $oembeds);
        static::assertEquals('yt1', $oembeds['https://www.youtube.com/watch?v=yt1']);
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testParseOembedsWithZeroMax()
    {
        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt1',
            'preview' => 'yt1'
        ]))->save());

        static::assertTrue((new UrlOembed([
            'url' => 'https://www.youtube.com/watch?v=yt2',
            'preview' => 'yt2'
        ]))->save());

        $text = "[https://www.youtube.com/watch?v=yt1](oembed:https://www.youtube.com/watch?v=yt1)\n\n[https://www.youtube.com/watch?v=yt2](oembed:https://www.youtube.com/watch?v=yt2)";
        $oembeds = OembedExtension::parseOembeds($text, 0);
        static::assertCount(0, $oembeds);
    }

}

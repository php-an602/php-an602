<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace tests\codeception\unit\modules\content\widgets;

use an602\modules\content\widgets\richtext\extensions\link\RichTextLinkExtension;
use an602\modules\content\widgets\richtext\extensions\mentioning\MentioningExtension;
use tests\codeception\_support\An602DbTestCase;


class RichTextLinkExtensionTest extends An602DbTestCase
{
    /*
     * Links
     */

    // TODO: test RichTextLinKExtensionMatch with addition (e.g. image size)

    public function testParseSimpleLinkExtension()
    {
        $text = '[Text](my-extension:extensionId "title")';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEquals('title', $matches[0]->getTitle());
        static::assertEmpty($matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithEmptyText()
    {
        $text = '[](my-extension:extensionId "title")';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEmpty($matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEquals('title', $matches[0]->getTitle());
        static::assertEmpty($matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithEmptyExtensionId()
    {
        $text = '[Text](my-extension: "title")';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEmpty($matches[0]->getExtensionId());
        static::assertEquals('title', $matches[0]->getTitle());
        static::assertEmpty($matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithEmptyTitle()
    {
        $text = '[Text](my-extension:extensionId "")';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEmpty($matches[0]->getTitle());
        static::assertEmpty($matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithoutTitle()
    {
        $text = '[Text](my-extension:extensionId)';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEmpty( $matches[0]->getTitle());
        static::assertEmpty($matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithtAddition()
    {
        $text = '[Text](my-extension:extensionId "title" 150x150)';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEquals('title', $matches[0]->getTitle());
        static::assertEquals('150x150', $matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithoutTitleAndWithAddition()
    {
        $text = '[Text](my-extension:extensionId 150x150)';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEquals('extensionId', $matches[0]->getExtensionId());
        static::assertEmpty( $matches[0]->getTitle());
        static::assertEquals('150x150', $matches[0]->getAddition());
    }

    public function testParseLinkExtensionWithoutTitleAndExtensionIdAndWithAddition()
    {
        $text = '[Text](my-extension: 150x150)';
        $matches = RichTextLinkExtension::scanLinkExtension($text, 'my-extension');
        static::assertCount(1, $matches);
        static::assertEquals('Text', $matches[0]->getText());
        static::assertEquals('my-extension', $matches[0]->getExtensionKey());
        static::assertEmpty( $matches[0]->getExtensionId());
        static::assertEmpty( $matches[0]->getTitle());
        static::assertEquals('150x150', $matches[0]->getAddition());
    }

    public function testBuildSimpleLinkExtensionString()
    {
        $result = MentioningExtension::buildExtensionLink('Text', 'extensionId', 'title');
        static::assertEquals('[Text](mention:extensionId "title")', $result);
    }

    public function testBuildSimpleLinkExtensionStringWithAddition()
    {
        $result = MentioningExtension::buildExtensionLink('Text', 'extensionId', 'title', '150x150');
        static::assertEquals('[Text](mention:extensionId "title" 150x150)', $result);
    }

    public function testBuildSimpleLinkExtensionStringWithoutTitleAndWithAddition()
    {
        $result = MentioningExtension::buildExtensionLink('Text', 'extensionId', null, '150x150');
        static::assertEquals('[Text](mention:extensionId 150x150)', $result);
    }

}

<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace tests\codeception\unit\modules\content\widgets;

use an602\models\UrlOembed;
use an602\modules\content\widgets\richtext\ProsemirrorRichText;
use an602\modules\content\widgets\richtext\RichText;
use an602\modules\file\models\File;
use an602\modules\post\models\Post;
use an602\modules\user\models\User;
use tests\codeception\_support\An602DbTestCase;


class RichTextLinkExtensionLegacyTest extends An602DbTestCase
{

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testScanLinkExtension()
    {
        $match = ProsemirrorRichText::scanLinkExtension('[Text](test:id "title")', 'test');

        static::assertEquals('[Text](test:id "title")', $match[0][0]);
        static::assertEquals('Text', $match[0][1]);
        static::assertEquals('test', $match[0][2]);
        static::assertEquals('id', $match[0][3]);
        static::assertEquals('title', $match[0][4]);
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testReplaceLinkExtension()
    {
        $resultMatch = [];

        $result = ProsemirrorRichText::replaceLinkExtension('[Text](test:id "title")', 'test', function($match) use (&$resultMatch) {
            $resultMatch = $match;
            return 'tested';
        });

        static::assertEquals('tested', $result);
        static::assertEquals('[Text](test:id "title")', $resultMatch[0]);
        static::assertEquals('Text', $resultMatch[1]);
        static::assertEquals('test', $resultMatch[2]);
        static::assertEquals('id', $resultMatch[3]);
        static::assertEquals('title', $resultMatch[4]);
    }
}

<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace tests\codeception\unit\modules\content;

use an602\modules\content\tests\codeception\unit\TestContent;
use modules\content\tests\codeception\_support\ContentModelTest;
use tests\codeception\_support\An602DbTestCase;
use Codeception\Specify;

use an602\modules\space\models\Space;
use an602\modules\content\models\Content;
use Yii;

class ContentVisibilityTest extends ContentModelTest
{

    public function testDefaultVisibilityPrivateSpace()
    {
        $this->space->visibility = Space::VISIBILITY_NONE;

        $newModel = new TestContent($this->space, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PRIVATE);
    }

    public function testDefaultVisibilityProtectedSpace()
    {
        $this->space->visibility = Space::VISIBILITY_REGISTERED_ONLY;

        $newModel = new TestContent($this->space, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PRIVATE);
    }

    public function testDefaultVisibilityPublicSpace()
    {
        $this->space->visibility = Space::VISIBILITY_ALL;

        $newModel = new TestContent($this->space, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PRIVATE);
    }

    public function testCreatePublicContentOnPublicSpace()
    {
        $this->space->visibility = Space::VISIBILITY_ALL;

        $newModel = new TestContent($this->space, Content::VISIBILITY_PUBLIC, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PUBLIC);
    }

    public function testCreatePublicContentOnProtectedSpace()
    {
        $this->space->visibility = Space::VISIBILITY_REGISTERED_ONLY;

        $newModel = new TestContent($this->space, Content::VISIBILITY_PUBLIC, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PUBLIC);
    }

    public function testCreateContentOnDefaultContentVisibilityPublic()
    {
        $this->space->visibility = Space::VISIBILITY_ALL;
        $this->space->default_content_visibility = Content::VISIBILITY_PUBLIC;

        $newModel = new TestContent($this->space, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PUBLIC);
    }

    public function testCreateContentOnDefaultContentVisibilityPrivate()
    {
        $this->space->visibility = Space::VISIBILITY_ALL;
        $this->space->default_content_visibility = Content::VISIBILITY_PRIVATE;

        $newModel = new TestContent($this->space, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PRIVATE);
    }

    /**
     * Make sure private spaces can not produce public content
     *
     * Visibility integrity check missing!
     *
     * @skip
     * @throws \yii\base\Exception
     */
    public function testCreatePublicContentOnPrivateSpace()
    {
        $this->space->visibility = Space::VISIBILITY_NONE;

        $newModel = new TestContent($this->space, Content::VISIBILITY_PUBLIC, [
            'message' => 'Test'
        ]);

        $this->assertTrue($newModel->save());
        $this->assertEquals($newModel->content->visibility, Content::VISIBILITY_PRIVATE);
    }
}

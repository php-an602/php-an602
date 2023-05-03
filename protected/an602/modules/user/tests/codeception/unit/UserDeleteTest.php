<?php

namespace tests\codeception\unit;

use an602\modules\admin\models\forms\UserDeleteForm;
use an602\modules\content\models\Content;
use an602\modules\post\models\Post;
use an602\modules\space\models\Space;
use an602\modules\user\models\User;
use tests\codeception\_support\An602DbTestCase;

class UserDeleteTest extends An602DbTestCase
{

    public function testUserSoftDelete()
    {
        $this->becomeUser('Admin');

        $user = User::findOne(['id' => 2]);

        $space = Space::findOne(['id' => 2]);
        $this->assertTrue($space->isSpaceOwner(2));

        $post = Post::findOne(['id' => 10]);
        $this->assertTrue($post->isOwner($user));

        $form = new UserDeleteForm(['user' => $user, 'deleteContributions' => false, 'deleteSpaces' => false]);
        $spaces = $form->getOwningSpaces();
        $this->assertEquals(1, count($spaces));
        $this->assertEquals(2, $spaces[0]->id);

        $this->assertNotNull(User::findOne(['id' => 2]));

        $this->assertTrue($form->performDelete());

        // check if admin has become owner of this space
        $space = Space::findOne(['id' => 2]);
        $this->assertTrue($space->isSpaceOwner(1));

        // make sure the content has not been deleted
        $this->assertNotNull(Post::findOne(['id' => 10]));
        $this->assertNotNull(Content::findOne(['id' => 10]));

        // make sure profile content has been deleted
        $this->assertNull(Post::findOne(['id' => 3]));
        $this->assertNull(Post::findOne(['id' => 4]));
        $this->assertNull(Content::findOne(['id' => 3]));
        $this->assertNull(Content::findOne(['id' => 4]));
    }

    public function testUserDeleteWithContributions()
    {
        $this->becomeUser('Admin');

        $user = User::findOne(['id' => 2]);

        $form = new UserDeleteForm(['user' => $user, 'deleteContributions' => true, 'deleteSpaces' => false]);

        $this->assertTrue($form->performDelete());

        $this->assertNull(User::findOne(['id' => 2]));

        // check if admin has become owner of this space
        $space = Space::findOne(['id' => 2]);
        $this->assertTrue($space->isSpaceOwner(1));

        // make sure space content has been deleted
        $this->assertNull(Post::findOne(['id' => 10]));
        $this->assertNull(Content::findOne(['id' => 10]));

        // make sure profile content has been deleted
        $this->assertNull(Post::findOne(['id' => 3]));
        $this->assertNull(Post::findOne(['id' => 4]));
        $this->assertNull(Content::findOne(['id' => 3]));
        $this->assertNull(Content::findOne(['id' => 4]));
    }

    public function testUserFullDelete()
    {
        $this->becomeUser('Admin');

        $user = User::findOne(['id' => 2]);

        $form = new UserDeleteForm(['user' => $user, 'deleteContributions' => true, 'deleteSpaces' => true]);

        $this->assertTrue($form->performDelete());

        $this->assertNull(User::findOne(['id' => 2]));

        // make sure the owning space has been deleted
        $this->assertNull(Space::findOne(['id' => 2]));

        // make sure space content has been deleted
        $this->assertNull(Post::findOne(['id' => 10]));
        $this->assertNull(Content::findOne(['id' => 10]));

        // make sure profile content has been deleted
        $this->assertNull(Post::findOne(['id' => 3]));
        $this->assertNull(Post::findOne(['id' => 4]));
        $this->assertNull(Content::findOne(['id' => 3]));
        $this->assertNull(Content::findOne(['id' => 4]));
    }
}
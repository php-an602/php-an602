<?php

namespace tests\codeception\_support;

use an602\models\UrlOembed;
use an602\modules\content\widgets\richtext\converter\RichTextToHtmlConverter;
use an602\modules\content\widgets\richtext\converter\RichTextToMarkdownConverter;
use an602\modules\content\widgets\richtext\converter\RichTextToPlainTextConverter;
use an602\modules\content\widgets\richtext\converter\RichTextToShortTextConverter;
use an602\modules\live\tests\codeception\fixtures\LiveFixture;
use an602\modules\user\tests\codeception\fixtures\UserFullFixture;
use an602\tests\codeception\fixtures\UrlOembedFixture;
use Yii;
use yii\db\ActiveRecord;
use Codeception\Test\Unit;
use an602\libs\BasePermission;
use an602\modules\activity\models\Activity;
use an602\modules\content\components\ContentContainerPermissionManager;
use an602\modules\notification\models\Notification;
use an602\modules\user\components\PermissionManager;
use an602\modules\user\models\User;
use an602\modules\friendship\models\Friendship;

/**
 * @SuppressWarnings(PHPMD)
 */
class An602DbTestCase extends Unit
{

    protected $fixtureConfig;

    public $appConfig = '@tests/codeception/config/unit.php';

    public $time;


    protected function setUp(): void
    {
        parent::setUp();

        $webRoot = dirname(dirname(__DIR__)) . '/../../..';
        Yii::setAlias('@webroot', realpath($webRoot));
        $this->initModules();
        $this->reloadSettings();
        $this->flushCache();
        $this->deleteMails();
    }

    protected function reloadSettings()
    {
        Yii::$app->settings->reload();

        foreach (Yii::$app->modules as $module) {
            if ($module instanceof \an602\components\Module) {
                $module->settings->reload();
            }
        }
    }

    protected function flushCache()
    {
        RichTextToShortTextConverter::flushCache();
        RichTextToHtmlConverter::flushCache();
        RichTextToPlainTextConverter::flushCache();
        RichTextToMarkdownConverter::flushCache();
        UrlOembed::flush();
    }

    protected function deleteMails()
    {
        $path = Yii::getAlias('@runtime/mail');
        $files = glob($path . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
    }

    /**
     * Initializes modules defined in @tests/codeception/config/test.config.php
     * Note the config key in test.config.php is modules and not an602Modules!
     */
    protected function initModules()
    {
        $cfg = \Codeception\Configuration::config();

        if (!empty($cfg['an602_modules'])) {
            Yii::$app->moduleManager->enableModules($cfg['an602_modules']);
        }
    }

    /**
     * @inheritdoc
     */
    public function _fixtures()
    {
        $cfg = \Codeception\Configuration::config();

        if (!$this->fixtureConfig && isset($cfg['fixtures'])) {
            $this->fixtureConfig = $cfg['fixtures'];
        }

        $result = [];

        if (!empty($this->fixtureConfig)) {
            foreach ($this->fixtureConfig as $fixtureTable => $fixtureClass) {
                if ($fixtureClass === 'default') {
                    $result = array_merge($result, $this->getDefaultFixtures());
                } else {
                    $result[$fixtureTable] = ['class' => $fixtureClass];
                }
            }
        }

        return $result;
    }

    protected function getDefaultFixtures()
    {
        return [
            'user' => ['class' => UserFullFixture::class],
            'url_oembed' => ['class' => UrlOembedFixture::class],
            'group_permission' => ['class' => \an602\modules\user\tests\codeception\fixtures\GroupPermissionFixture::class],
            'contentcontainer' => ['class' => \an602\modules\content\tests\codeception\fixtures\ContentContainerFixture::class],
            'settings' => ['class' => \an602\tests\codeception\fixtures\SettingFixture::class],
            'space' => ['class' => \an602\modules\space\tests\codeception\fixtures\SpaceFixture::class],
            'space_membership' => ['class' => \an602\modules\space\tests\codeception\fixtures\SpaceMembershipFixture::class],
            'content' => ['class' => \an602\modules\content\tests\codeception\fixtures\ContentFixture::class],
            'notification' => ['class' => \an602\modules\notification\tests\codeception\fixtures\NotificationFixture::class],
            'file' => ['class' => \an602\modules\file\tests\codeception\fixtures\FileFixture::class],
            'file_history' => ['class' => \an602\modules\file\tests\codeception\fixtures\FileHistoryFixture::class],
            'activity' => ['class' => \an602\modules\activity\tests\codeception\fixtures\ActivityFixture::class],
            'friendship' => ['class' => \an602\modules\friendship\tests\codeception\fixtures\FriendshipFixture::class],
            'live' => [ 'class' => LiveFixture::class]
        ];
    }

    public function assertHasNotification($class, ActiveRecord $source, $originator_id = null, $target_id = null, $msg = '')
    {
        $notificationQuery = Notification::find()->where([
            'class' => $class,
            'source_class' => $source->className(),
            'source_pk' => $source->getPrimaryKey(),
        ]);
        if(is_string($target_id)) {
            $msg = $target_id;
            $target_id = null;
        }

        if ($originator_id != null) {
            $notificationQuery->andWhere(['originator_user_id' => $originator_id]);
        }

        if($target_id != null) {
            $notificationQuery->andWhere(['user_id' => $target_id]);
        }

        $this->assertNotEmpty($notificationQuery->all(), $msg);
    }

    public function assertEqualsNotificationCount($count, $class, ActiveRecord $source, $originator_id = null, $target_id = null, $msg = '')
    {
        $notificationQuery = Notification::find()->where(['class' => $class, 'source_class' => $source->className(), 'source_pk' => $source->getPrimaryKey()]);

        if ($originator_id != null) {
            $notificationQuery->andWhere(['originator_user_id' => $originator_id]);
        }

        if($target_id != null) {
            $notificationQuery->andWhere(['user_id' => $target_id]);
        }

        $this->assertEquals($count, $notificationQuery->count(), $msg);
    }

    public function assertHasNoNotification($class, ActiveRecord $source, $originator_id = null, $target_id = null, $msg = '')
    {
        $notificationQuery = Notification::find()->where(['class' => $class, 'source_class' => $source->className(), 'source_pk' => $source->getPrimaryKey()]);

        if ($originator_id != null) {
            $notificationQuery->andWhere(['originator_user_id' => $originator_id]);
        }

        if($target_id != null) {
            $notificationQuery->andWhere(['user_id' => $target_id]);
        }

        $this->assertEmpty($notificationQuery->all(), $msg);
    }

    public function assertHasActivity($class, ActiveRecord $source, $msg = '')
    {
        $activity = Activity::findOne([
            'class' => $class,
            'object_model' => $source->className(),
            'object_id' => $source->getPrimaryKey(),
        ]);
        $this->assertNotNull($activity, $msg);
    }

    /**
     * @return \Codeception\Module\Yii2|\Codeception\Module
     * @throws \Codeception\Exception\ModuleException
     */
    public function getYiiModule() {
        return $this->getModule('Yii2');
    }

    /**
     * @see assertSentEmail
     * @since 1.3
     */
    public function assertMailSent($count = 0)
    {
        return $this->getYiiModule()->seeEmailIsSent($count);
    }

    /**
     * @param int $count
     * @throws \Codeception\Exception\ModuleException
     * @since 1.3
     */
    public function assertSentEmail($count = 0)
    {
        return $this->getYiiModule()->seeEmailIsSent($count);
    }

    public function assertEqualsLastEmailTo($to, $strict = true)
    {
        if(is_string($to)) {
            $to = [$to];
        }

        $message = $this->getYiiModule()->grabLastSentEmail();
        $expected = $message->getTo();

        foreach ($to as $email) {
            $this->assertArrayHasKey($email, $expected);
        }

        if($strict) {
            $this->assertEquals(count($to), count($expected));
        }

    }

    public function assertEqualsLastEmailSubject($subject)
    {
        $message = $this->getYiiModule()->grabLastSentEmail();
        $this->assertEquals($subject, str_replace(["\n", "\r"], '', $message->getSubject()));
    }

    /**
     * @param bool $allow
     */
    public function allowGuestAccess($allow = true)
    {
        Yii::$app
            ->getModule('user')
            ->settings
            ->set('auth.allowGuestAccess', (int)$allow);
    }

    public function setProfileField($field, $value, $user)
    {
        if(is_int($user)) {
            $user = User::findOne($user);
        } elseif (is_string($user)) {
            $user = User::findOne(['username' => $user]);
        } elseif (!$user) {
            $user = Yii::$app->user->identity;
        }

        $user->profile->setAttributes([$field => $value]);
        $user->profile->save();
    }

    public function becomeFriendWith($username)
    {
        $user = User::findOne(['username' => $username]);
        Friendship::add($user, Yii::$app->user->identity);
        Friendship::add(Yii::$app->user->identity, $user);
    }

    public function follow($username)
    {
        User::findOne(['username' => $username])->follow();
    }

    public function enableFriendships($enable = true)
    {
        Yii::$app->getModule('friendship')->settings->set('enable', $enable);
    }

    public function setGroupPermission($groupId, $permission, $state = BasePermission::STATE_ALLOW)
    {
        $permissionManger = new PermissionManager();
        $permissionManger->setGroupState($groupId, $permission, $state);
        Yii::$app->user->permissionManager->clear();
    }

    public function setContentContainerPermission(
        $contentContainer,
        $groupId,
        $permission,
        $state = BasePermission::STATE_ALLOW
    ) {
        $permissionManger = new ContentContainerPermissionManager(['contentContainer' => $contentContainer]);
        $permissionManger->setGroupState($groupId, $permission, $state);
        $contentContainer->permissionManager->clear();
    }

    public function becomeUser($userName)
    {
        $user = User::findOne(['username' => $userName]);
        Yii::$app->user->switchIdentity($user);
        return $user;
    }

    public function logout()
    {
        Yii::$app->user->logout(true);
    }

}

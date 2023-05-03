<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets\mails;

use an602\modules\space\models\Space;

/**
 * MailContentContainerImage renders the profile image of a ContentContainer.
 *
 * @author buddha
 * @since 1.2
 */
class MailContentContainerImage extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentContainerActiveRecord
     */
    public $container;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $url = ($this->container instanceof Space) 
                ? $this->container->createUrl('/space/space', [], true)
                : $this->container->createUrl('/user/profile', [], true);
        
        return $this->render('mailContentContainerImage', [
                    'container' => $this->container,
                    'url' => $url,
        ]);
    }

}

?>
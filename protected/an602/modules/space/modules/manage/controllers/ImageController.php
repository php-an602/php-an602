<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\modules\manage\controllers;

use an602\modules\content\components\ContentContainerControllerAccess;
use an602\modules\content\controllers\ContainerImageController;
use an602\modules\space\models\Space;

/**
 * ImageControllers handles space profile and banner image
 *
 * @author Luke
 */
class ImageController extends ContainerImageController
{
    public $validContentContainerClasses = [Space::class];

    public function getAccessRules()
    {
        return [
            [ContentContainerControllerAccess::RULE_USER_GROUP_ONLY => [Space::USERGROUP_ADMIN]],
        ];
    }

    public $imageUploadName = 'spacefiles';
    public $bannerUploadName = 'bannerfiles';

}

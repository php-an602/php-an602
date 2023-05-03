<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use an602\modules\admin\widgets\ModuleCard as AdminModuleCard;
use an602\modules\content\components\ContentContainerActiveRecord;

/**
 * ModuleCard shows a card with module data of Content Container
 * 
 * @since 1.11
 * @author Luke
 */
class ModuleCard extends AdminModuleCard
{

    /**
     * @var ContentContainerActiveRecord
     */
    public $contentContainer;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $card = $this->render($this->view, [
            'module' => $this->module,
            'contentContainer' => $this->contentContainer,
        ]);

        return str_replace('{card}', $card, $this->template);
    }

}

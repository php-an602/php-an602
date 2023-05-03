<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use yii\helpers\Url;

/**
 * PermaLink for Wall Entries
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Permalink" Link to the Content Objects.
 *
 * @package an602.modules_core.wall.widgets
 * @since 0.5
 */
class PermaLink extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentActiveRecord
     */
    public $content;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $permaLink = Url::to(['/content/perma', 'id' => $this->content->content->id], true);
        
        return $this->render('permaLink', [
                    'permaLink' => $permaLink,
                    'id' => $this->content->content->id
        ]);
    }

}

?>
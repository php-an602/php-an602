<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\widgets;


/**
 * Class CounterSet
 *
 * @since 1.3
 * @package an602\modules\ui\widgets
 */
class CounterSet extends \an602\components\Widget
{
    /**
     * @var CounterSetItem[]
     */
    public $counters = [];


    /**
     * @var string the template to use
     */
    public $template = '@ui/widgets/views/counterSetHeader';


    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render($this->template, ['counters' => $this->counters]);
    }
}

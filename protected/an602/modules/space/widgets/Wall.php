<?php

namespace an602\modules\space\widgets;

use yii\base\Widget;

class Wall extends Widget
{

    public $space;

    public function run()
    {
        return $this->render('spaceWall', ['space' => $this->space]);
    }

}

<?php


namespace app\components;


use yii\base\Action;

class TestAction extends Action
{
    public function run()
    {
        return "It's test action";
    }

}
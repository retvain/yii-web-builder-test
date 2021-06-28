<?php


namespace app\controllers;


use yii\web\Controller;
use app\components\TestAction;

class TestController extends BaseController
{
//    public $foo = 'variable';
//    public $layout = 'test';

    public function actions()
    {
        return [
            // my test action
            'test' => ['class' => 'app\components\TestAction'],

        ];
    }

    public function actionIndex()
    {
        $test = 'test';
        \Yii::$app->view->params['retvain'] = 'rtvn';
        return $this->render('index', compact('test'));
    }

//    public function actionTest()
//    {
//        return "hi bro";
//    }

}
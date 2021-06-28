<?php


namespace app\controllers;


use app\models\EntryForm;
use yii\web\Controller;
use app\components\TestAction;

class TestController extends BaseController
{
//    public $foo = 'variable';
    public $layout = 'test';


    public function actions()
    {
        return [
            // my test action
            'test' => ['class' => 'app\components\TestAction'],

        ];
    }

    public function actionIndex()
    {
        \Yii::$app->view->title = 'testIndex';

        $model = new EntryForm();
        return $this->render('index', compact('model'));
    }

//    public function actionTest()
//    {
//        return "hi bro";
//    }

}
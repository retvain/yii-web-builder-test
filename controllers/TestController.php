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


        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            if(\Yii::$app->request->isPjax)
            {
                \Yii::$app->session->setFlash('success', 'data accepted with Pjax');
                $model = new EntryForm();
            }else
            {
                \Yii::$app->session->setFlash('success', 'data taken as standard');
                return $this->refresh();
            }



        }
        return $this->render('index', compact('model'));
    }

//    public function actionTest()
//    {
//        return "hi bro";
//    }

}
<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends BaseController
{
    public $foo = 'variable';
    public $layout = 'test';

    public function actionIndex () {


        return $this->render('index');
    }

}
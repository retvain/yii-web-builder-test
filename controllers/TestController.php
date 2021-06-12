<?php


namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public $foo = 'variable';

    public function actionIndex () {

        dd(\Yii::$app, 1);
        return $this->render('index');
    }

}
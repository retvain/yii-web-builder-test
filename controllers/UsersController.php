<?php


namespace app\controllers;


class UsersController extends BaseController
{
    public $title = 'Users';

    public function actionIndex () {


        return $this->render('index');


    }
}
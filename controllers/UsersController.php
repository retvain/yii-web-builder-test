<?php


namespace app\controllers;


class UsersController extends BaseController
{


    public function actionIndex () {

        return $this->render('index');


    }
}
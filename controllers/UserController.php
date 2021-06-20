<?php


namespace app\controllers;


use app\models\User;
use yii\rest\ActiveController;


class UserController extends ActiveController
{
    public $modelClass = User::class;


/*    public function actionIndex()
    {
        $query = new \yii\db\Query();
        $result = $query->from('users')->all();
        //dd($result, 1);
        return $this->render('index', [
            'users' => $result,
        ]);

    }

    public function actionShow ($id)
    {

        $query = new \yii\db\Query();
        $result = $query->from('users')
            ->where([
                'id' => $id,
            ])
        ->all();
        //dd($result, 1);
        return $this->render('show', [
            'user' => $result,
        ]);


    }*/
}
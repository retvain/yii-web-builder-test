<?php


namespace app\controllers;


use app\models\Users;
use yii\rest\ActiveController;


class UsersController extends ActiveController
{
    public $modelClass = Users::class;


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
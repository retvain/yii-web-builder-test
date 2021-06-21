<?php


namespace app\controllers;


use app\models\Comment;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = Comment::class;

    public function actionFilter($userId) {

        return new ActiveDataProvider([
            'query' => Comment::find()->andWhere(['user_id' => \Yii::$app->request->get('userId')])
        ]);
    }

}
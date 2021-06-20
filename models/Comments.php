<?php


namespace app\models;


use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public function rules()
    {
        return [
            [['user_id', 'date', 'text', 'published_at'], 'required'],
        ];
    }
}
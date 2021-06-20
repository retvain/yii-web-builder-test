<?php


namespace app\models;


use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public function rules()
    {
        return [
            [['born_date', 'phone_number', 'city'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    public function getComments()
    {
        //one to many
        return $this->hasMany(Comment::class, ['user_id' => 'id']);
    }

}
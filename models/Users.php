<?php


namespace app\models;


use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public function rules()
    {
        return [
          [['name', 'born_date', 'phone_number', 'city', 'avatar'], 'required'],
        ];
    }

    public function getComments()
    {
        //one to many
        return $this->hasMany(Comments::class, ['user_id' => 'id']);
    }

}
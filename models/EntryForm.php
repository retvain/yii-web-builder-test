<?php


namespace app\models;


use yii\base\Model;

class EntryForm extends Model
{

    public $name, $email, $text;

    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            ['email', 'email'],
        ];
    }

    // set labels in form
    public function attributeLabels()
    {
        return [
            'name' => 'CustomName:',
            'email' => 'CustomEmail:',
            'text' => 'CustomText:',
        ];
    }
}
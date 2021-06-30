<?php


namespace app\models;


use yii\base\Model;

class EntryForm extends Model
{

    public $name, $email, $text, $topic;

    public function rules()
    {
        return [
            [['name', 'email', 'text',], 'required'],
            ['topic', 'required', 'message' => 'Oops'],
            ['topic', 'string', 'min' => 3, 'tooShort' => '3 min pls'],
            ['topic', 'string', 'max' => 10, 'tooLong' => '10 max pls'],
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
            'topic' => 'Custom Theme:',
        ];
    }
}
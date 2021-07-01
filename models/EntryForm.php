<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{

    public $name;
    public $email;
    public $text;
    public $topic;

    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            ['email', 'email'],
            ['topic', 'validateCountry', 'skipOnEmpty' => false],
//            ['topic', 'string', 'length' => [3, 5]],
//            ['topic', 'string', 'min' => 3, 'tooShort' => '3 min'],
//            ['topic', 'string', 'max' => 5, 'tooLong' => '5 max'],
//            ['topic', 'required', 'message' => 'Oops'],
//            ['topic', 'safe'],
        ];
    }

    public function validateCountry($attribute, $params)
    {
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, 'Страна должна быть либо "USA" или "Indonesia".');
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя:',
            'email' => 'E-mail:',
            'text' => 'Текст:',
            'topic' => 'Тема:',
        ];
    }

}
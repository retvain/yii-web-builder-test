<?php


namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public $status;

    public function rules()
    {
        return [
            [['code', 'name', 'population', 'countrystatus',], 'required'],
            ['code', 'unique'],
            ['population', 'integer'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'Country code',
            'name' => 'Country',
            'population' => 'How many people live here',
        ];
    }
}
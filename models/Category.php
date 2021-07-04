<?php


namespace app\models;


class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%wfm_categories}}';
    }

}
<?php


namespace app\models;

use \yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%categories}}';
    }

    public function getProducts($price = 1000)
    {
        return $this->hasMany(Product::class, ['category_id' => 'id'])
            ->where('price < :price', [':price' => $price])
            ->orderBy('price DESC');
    }

}
<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends BaseController
{

    public function actionIndex()
    {
        $this->view->title = 'Products';
        $products = Product::find()->all();

        return $this->render('index', compact('products'));
    }


}
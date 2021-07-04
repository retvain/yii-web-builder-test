<?php


namespace app\controllers;


use app\models\Category;

class CategoryController extends BaseController
{

    public function actionIndex()
    {
        $this->view->title = 'Categories';
        $categories = Category::find()->all();

        return $this->render('index', compact('categories'));

    }

}
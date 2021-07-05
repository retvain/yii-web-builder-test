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

    public function actionView($id = null)
    {
        $category = Category::findOne($id);
        $this->view->title = "Category: {$category->title}";

        return $this->render('view', compact('category'));
    }

}
<?php


namespace app\controllers;


use app\models\Category;
use yii\web\NotFoundHttpException;

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
        if (!$category){
            throw new NotFoundHttpException("can't found category {$id}");
        }
        $this->view->title = "Category: {$category->title}";
        $products = $category->getProducts(850)->all();

        return $this->render('view', compact('category','products'));
    }

}
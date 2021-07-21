<?php


namespace app\controllers;


use app\models\Country;
use app\models\EntryForm;
use yii\web\Controller;
use app\components\TestAction;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends BaseController
{
//    public $foo = 'variable';
    public $layout = 'test';


    public function actions()
    {
        return [
            // my test action
            'test' => ['class' => 'app\components\TestAction'],

        ];
    }

    public function actionIndex()
    {
        \Yii::$app->view->title = 'testIndex';

        $model = new EntryForm();

        $model->load(\Yii::$app->request->post());
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->validate()) {

                return ['message' => 'ok'];
            } else {
                return ActiveForm::validate($model);
            }
            //return ActiveForm::validateMultiple($model);
        }


        /*if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            if(\Yii::$app->request->isPjax)
            {
                \Yii::$app->session->setFlash('success', 'data accepted with Pjax');
                $model = new EntryForm();
            }else
            {
                \Yii::$app->session->setFlash('success', 'data taken as standard');
                return $this->refresh();
            }



        }*/
        return $this->render('index', compact('model'));
    }

    public function actionView()
    {
        $model = new Country();
        $this->layout = 'test';
        $this->view->title = 'work with models';

        //$countries = Country::find()->where("population < 100000000 AND code <> 'AU'")->all();

        //for safe query
        //$countries = Country::find()->where("population < :population AND code <> :code", [':code' => 'AU', ':population' => 100000000])->all();

//        $countries = Country::find()->where([
//            'code' => ['DE', 'FR', 'GB'],
//            'status' => 1,
//        ])->all();

        //$countries = Country::find()->where(['like', 'name', 'uni'])->all();

        $countries = Country::find()->orderBy('population', 'DESC')->all();


        return $this->render('view', compact('countries'));
    }

    public function actionCreate()
    {
        $this->layout = 'test';
        $this->view->title = 'work with models';

        $country = new Country();

        if (\Yii::$app->request->isAjax) {
            $country->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($country);
        }

        //Если данные получены реквестом методом пост И данные провалидированы успешно
        $result = $country->load(\Yii::$app->request->post());
        if ($result && $country->save()) {
            return $this->refresh();
        }

        return $this->render('create', compact('country'));
    }

    public function actionUpdate()
    {
        $this->layout = 'test';
        $this->view->title = 'Update';

        $country = Country::findOne('UA');

        //проверяем существование такой страны
        if (!$country){
            //если не существует, кидаем 404, с сообщением
            throw new NotFoundHttpException('Country not found');
        }

        //Если данные получены реквестом методом пост И данные провалидированы успешно
        $result = $country->load(\Yii::$app->request->post());
        if ($result && $country->save()) {
            \Yii::$app->session->setFlash('success', 'successful');
            return $this->refresh();
        }

        return $this->render('update', compact('country'));
    }

    public function actionDelete($code = '')
    {
        $this->layout = 'test';
        $this->view->title = 'Delete';

        $country = Country::findOne($code);

        if($country) {
            if ($country->delete() !== false){
                \Yii::$app->session->setFlash('success', 'has ben deleted');
            }else{
                \Yii::$app->session->setFlash('error', 'Error');
            }
        }

        return $this->render('delete', compact('country'));
    }

    public function actionQform()
    {
        $this->layout = 'test';
        $this->view->title = 'qform';

        return $this->render('qform');
    }


}

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'User info.' . ' id: ' . $user[0]['id'];
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <div class="row">


            <div class="col-3">
                <div class="card" style="width: 40rem;">
                    <img src="http://placekitten.com/400/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Username: <?= html::encode("{$user[0]['name']}") ?></h5>
                        <p class="card-text">About me: Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">City: <?= html::encode("{$user[0]['city']}") ?></li>
                        <li class="list-group-item">Born date: <?= html::encode("{$user[0]['born_date']}") ?></li>
                        <li class="list-group-item">Phone number: <?= html::encode("{$user[0]['phone_number']}") ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>



    </div>
</div>
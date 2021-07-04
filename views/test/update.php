<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="col-md-12">
    <h1><?= $this->title ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> <?= Yii::$app->session->getFlash('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'options' => [
            'class' => 'form-horizontal',
        ],
        'fieldConfig' => [
            'template' => "{label} \n <div class='col-md-12'>{input} </div> \n <div class='col-md-12'>{hint}</div> \n <div class='col-md-12'>{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]) ?>

    <?= $form->field($country, 'name') ?>
    <?= $form->field($country, 'population') ?>
    <?= $form->field($country, 'countrystatus')->checkbox([
        'uncheck' => 0,
        'checked' => 1,
    ], false) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php $form = ActiveForm::end() ?>

</div>


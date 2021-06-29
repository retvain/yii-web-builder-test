<?php

use yii\widgets\ActiveForm;

?>

<div class="row-cols-12">
    <h2>Page with form</h2>
    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, accusantium aliquam autem deserunt dolorem ducimus earum est illum iste labore laudantium nam nemo neque nihil nulla perspiciatis reprehenderit sequi veritatis?</p>

    <?php $form = ActiveForm::begin([
            'id' => 'my-form',
        'options' => [
                'class' => 'form-horizontal',
        ],
        'fieldConfig' => [
            'template' => "{label} \n <div class='col-md-5'>{input} </div> \n <div class='col-md-5'>{hint}</div> \n <div class='col-md-5'>{error}</div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]) ?>

    <?php
    echo $form->field($model, 'name')->textInput(['placeholder' => 'Insert name']);

    echo $form->field($model, 'email')->input('email', ['placeholder' => 'Insert Email']);

    echo $form->field($model, 'text')->textarea([
            'placeholder' => 'Insert text',
        'rows' => '5',
    ]);

    ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>




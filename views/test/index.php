<?php

use yii\widgets\ActiveForm;

?>

<div class="row-cols-12">
    <h2>Page with form</h2>
    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, accusantium aliquam autem deserunt dolorem ducimus earum est illum iste labore laudantium nam nemo neque nihil nulla perspiciatis reprehenderit sequi veritatis?</p>

    <?php $form = ActiveForm::begin() ?>

    <?php
    echo $form->field($model, 'name');
    echo $form->field($model, 'email');
    echo $form->field($model, 'text')->textarea();

    ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>




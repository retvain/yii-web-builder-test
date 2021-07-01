<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<div class="row-cols-12">
    <h2>Page with form</h2>
    <?php Pjax::begin() ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>
    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, accusantium aliquam autem deserunt
        dolorem ducimus earum est illum iste labore laudantium nam nemo neque nihil nulla perspiciatis reprehenderit
        sequi veritatis?</p>

    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => true,
        'options' => [
            'data' => ['pjax' => false],
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

    echo $form->field($model, 'topic', ['enableAjaxValidation' => true])->input('text', ['placeholder' => 'Insert Message theme']);

    echo $form->field($model, 'text')->textarea([
        'placeholder' => 'Insert text',
        'rows' => '5',
    ]);

    ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>
    <?php Pjax::end() ?>
</div>
<?php
$js = <<<JS
    let form = $('#my-form');
    form.on('beforeSubmit', function () {
        let data = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: data,
            success: function (res){
                console.log(res);
                form[0].reset();
            },
            error: function () {
                alert('Error!');
            }
        });
        return false;
    });
JS;

$this->registerJs($js);

?>



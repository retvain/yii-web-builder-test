<div class="col-m-12">
    <h1>work with models</h1>
    <?php dmp($countries) ?>
    <?php $form = \yii\widgets\ActiveForm::begin() ?>
<table class="table">
    <?php foreach ($countries as $country): ?>
    <tr>
    <td><?= $country->code ?></td>
        <td><?= $country->name ?></td>
        <td><?= $country->population ?></td>
        <td><?= $country->countrystatus ?></td>
    </tr>
    <?php endforeach; ?>
</table>

    <?php $form = \yii\widgets\ActiveForm::end() ?>
</div>
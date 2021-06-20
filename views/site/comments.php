<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\User;

?>
<button id="getData">Get Data</button>

<script>
    $(document).ready(function () {
        $('#getData').on('click', function () {

            console.log(1)
            // get data
            $.ajax({method: "GET", url: "http://yiiwebtest.test/comments"})
                .then((response) => {
                    console.log(response)
                });



        });
    });

</script>
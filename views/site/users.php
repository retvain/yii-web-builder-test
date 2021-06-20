<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\User;

?>
<!--<form method="post" action="http://yiiwebtest.test/user/create">-->
<label>Name</label>
<input type="text" name="name" id="name"> <br>
<label>born_date</label>
<input type="text" name="born_date" id="born_date"> <br>
<label>city</label>
<input type="text" name="city" id="city"> <br>
<label>phone_number</label>
<input type="text" name="phone_number" id="phone_number"> <br>
<button id="SaveToBd">submint</button>
<!--</form>-->

<script>
    $(document).ready(function () {
        $('#SaveToBd').on('click', function () {
            var nameValue = $('#name').val();
            var born_dateValue = $('#born_date').val();
            var cityValue = $('#city').val();
            var phone_numberValue = $('#phone_number').val();
            console.log(nameValue, born_dateValue, cityValue, phone_numberValue);

            /*send data*/
            $.ajax({
                method: "POST",
                url: "http://yiiwebtest.test/users/create",
                data: {name: nameValue, born_date: born_dateValue, city: cityValue, phone_number: phone_numberValue}
            })
                .done(function (msg) {
                    alert("Data Saved: " + msg);
                });
            $('#name').val('');
            $('#born_date').val('');
            $('#city').val('');
            $('#phone_number').val('');

        });

    });

</script>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<form method="post" action="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Yor name</label>
            <input type="text" class="form-control" id="">
        </div>
        <div class="form-group col-md-6">
            <label for="">Born date</label>
            <input type="" class="date form-control" id="">

        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>

        <div class="form-group col-md-6">
            <label for="phone_number">Phone number</label>
            <input type="number" class="form-control" id="">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>-->

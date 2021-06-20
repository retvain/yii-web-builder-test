<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\User;

?>
<div class="container">
    <button id="getData">Get Data</button>
    <br>
    <br>
    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">name</th>
                    <th scope="col">city</th>
                    <th scope="col">born_date</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="users">


                </tbody>
            </table>
        </div>

    <div class="col-4">
        456
    </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        //$('#getData').on('click', function () {        });

        // get data comments
        $.ajax({method: "GET", url: "http://yiiwebtest.test/comments"})
            .then((response) => {
                let comments = response;
                console.log(comments);
            });

        // get data users
        $.ajax({method: "GET", url: "http://yiiwebtest.test/users"})
            .then((response) => {
                let users = response;
                console.log(users);
            });
        $.getJSON("http://yiiwebtest.test/users", function (data) {
            var html = '';
            $.each(data, function (key, value) {
                html += '<tr>';
                html += '<th scope="row">' + value.id + '</th>';
                html += '<td><img src="'+value.avatar+'"></td>';
                html += '<td>' + value.name + '</td>';
                html += '<td>' + value.city + '</td>';
                html += '<td>' + value.born_date + '</td>';
                html += '<td>' + value.phone_number + '</td>';
                html += '<td><a href="#">Show comments</a></td>';
                html += '</tr>';
            });
            $('#users').html(html);
        });


        /*$.getJSON( "http://yiiwebtest.test/users", function( json ) {
        console.log( json[1]['name'] );
    });*/


    });

</script>








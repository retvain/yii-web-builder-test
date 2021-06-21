<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\User;

?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4>ajax users</h4>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control"> <br>
            </div>
            <div class="form-group">
                <label>born_date</label>
                <input type="text" name="born_date" id="born_date" class="form-control" value="1999-01-01"> <br>
            </div>
            <div class="form-group">
                <label>city</label>
                <input type="text" name="city" id="city" class="form-control"> <br>
            </div>
            <div class="form-group">
                <label>phone_number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"> <br>
            </div>
            <button id="SaveUserToBd">Save user</button>
            <br>
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

            <h4>ajax comments</h4>

            <div class="form-group">
                <label>text</label>
                <textarea class="form-control" id="text" name="text"></textarea>
            </div>
            <div class="form-group">
                <label>date</label>
                <input type="text" name="date" id="date" class="form-control" value="2021-06-21"> <br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">user_id</label>
                </div>
                <select class="custom-select" name="user_id" id="user_id">

                </select>
            </div>
            <div class="form-group">
                <label>Published</label>
                <input type="checkbox" aria-label="Checkbox for following text input" name="published" id="published">
            </div>

            <button id="SaveCommentToBd">Save comment</button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">user_id</th>
                    <th scope="col">date</th>
                    <th scope="col">text</th>
                    <th scope="col">published</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="comments">


                </tbody>
            </table>


        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        //показать всех пользователей при загрузке страницы
        $.getJSON("http://yiiwebtest.test/users", function (data) {
            let html = '';
            $.each(data, function (key, value) {
                html += '<tr>';
                html += '<th scope="row">' + value.id + '</th>';
                html += '<td><img src="' + value.avatar + '"></td>';
                html += '<td>' + value.name + '</td>';
                html += '<td>' + value.city + '</td>';
                html += '<td>' + value.born_date + '</td>';
                html += '<td>' + value.phone_number + '</td>';
                html += '<td><button class="showComments" id="' + value.id + '">Show comments</button></td>';
                html += '</tr>';
            });
            $('#users').html(html);
        });

        //сгенерировать список для выбора пользователя при добавлении комментария
        $.getJSON("http://yiiwebtest.test/users", function (data) {
            let html = '';
            $.each(data, function (key, value) {

                html += '<option value="'+value.id+'">'+value.id+'</option>';

            });
            $('#user_id').html(html);
        });


        //добавить пользователя и обновить список пользователей
        $('#SaveUserToBd').on('click', function () {
            let nameValue = $('#name').val();
            let born_dateValue = $('#born_date').val();
            let cityValue = $('#city').val();
            let phone_numberValue = $('#phone_number').val();
            console.log(nameValue, born_dateValue, cityValue, phone_numberValue);

            /*send data*/
            $.ajax({
                method: "POST",
                url: "http://yiiwebtest.test/user/create",
                data: {name: nameValue, born_date: born_dateValue, city: cityValue, phone_number: phone_numberValue}
            })
                .done();
            $('#name').val('');
            $('#born_date').val('');
            $('#city').val('');
            $('#phone_number').val('');

            $.getJSON("http://yiiwebtest.test/users", function (data) {
                let html = '';
                $.each(data, function (key, value) {
                    html += '<tr>';
                    html += '<th scope="row">' + value.id + '</th>';
                    html += '<td><img src="' + value.avatar + '"></td>';
                    html += '<td>' + value.name + '</td>';
                    html += '<td>' + value.city + '</td>';
                    html += '<td>' + value.born_date + '</td>';
                    html += '<td>' + value.phone_number + '</td>';
                    html += '<td><button class="showComments" id="' + value.id + '">Show comments</button></td>';
                    html += '</tr>';
                });
                $('#users').html(html);
                $.getJSON("http://yiiwebtest.test/users", function (data) {
                    let html = '';
                    $.each(data, function (key, value) {

                        html += '<option value="'+value.id+'">'+value.id+'</option>';

                    });
                    $('#user_id').html(html);
                });
            });

        });

        //добавить и сохранить комментарий
        $('#SaveCommentToBd').on('click', function () {
            let textValue = $('#text').val();
            let dateValue = $('#date').val();
            let userIdValue = $('#user_id').val();
            let publishedValue = $("#published").is(":checked") ? 1 : 0;

            /*send data*/
            $.ajax({
                method: "POST",
                url: "http://yiiwebtest.test/comment/create",
                data: {text: textValue, date: dateValue, user_id: userIdValue, published: publishedValue}
            })
                .done();
            $('#text').val('');
        })

        //изменить статус комментария опубликовано и не опубликовано
        $('#comments').on('click', 'td.changePublished', function () {
            let commentId = $(this).attr('id');
            let userId = $(this).attr('userid');
            let urlForEdit = "http://yiiwebtest.test/comment/update?id=" + commentId;
            let url = "http://yiiwebtest.test/comment/filter?userId=" + userId;
            let urlForCheck = "http://yiiwebtest.test/comment/view?id=" + commentId;
            $.getJSON(urlForCheck, function (data) {

                   if (data.published == 1)
                   {
                       $.ajax({
                           method: "PUT",
                           url: urlForEdit,
                           data: {published: 0}
                       })
                           .done();
                   }
                   else {
                       $.ajax({
                           method: "PUT",
                           url: urlForEdit,
                           data: {published: 1}
                       })
                           .done();
                   }
                $.getJSON(url, function (data) {
                    let html = '';
                    $.each(data, function (key, value) {
                        if (value.published == 1) {
                            value.published = 'published';
                        } else {value.published = 'NOT published'}
                        html += '<tr>';
                        html += '<th scope="row">' + value.id + '</th>';
                        html += '<td>' + value.user_id + '</td>';
                        html += '<td>' + value.date + '</td>';
                        html += '<td>' + value.text + '</td>';
                        html += '<td class="changePublished" id="'+value.id+'" userid="'+value.user_id+'">'+ value.published +'   CLICK ME TO CHANGE :) '+'</td>';
                        html += '<td><button class="deleteComment" id="' + value.id + '" userid="' + value.user_id + '">Delete comment</button></td>';
                        html += '</tr>';
                    });
                    $('#comments').html(html);
                });
            });





        });





        // вывод комментариев пользователя
        $('#users').on('click', 'button.showComments', function () {
            let userId = $(this).attr('id');
            let url = "http://yiiwebtest.test/comment/filter?userId=" + userId;

            $.getJSON(url, function (data) {
                let html = '';
                $.each(data, function (key, value) {
                    if (value.published == 1) {
                        value.published = 'published';
                    } else {value.published = 'NOT published'}
                    html += '<tr>';
                    html += '<th scope="row">' + value.id + '</th>';
                    html += '<td>' + value.user_id + '</td>';
                    html += '<td>' + value.date + '</td>';
                    html += '<td>' + value.text + '</td>';
                    html += '<td class="changePublished" id="'+value.id+'" userid="'+value.user_id+'">'+ value.published +'   CLICK ME TO CHANGE :) '+'</td>';
                    html += '<td><button class="deleteComment" id="' + value.id + '" userid="' + value.user_id + '">Delete comment</button></td>';
                    html += '</tr>';
                });
                $('#comments').html(html);
            });
        });

        //удаление комментария и отрисовка обновленного списка
        $('#comments').on('click', 'button.deleteComment', function () {
            let commentId = $(this).attr('id');
            let userId = $(this).attr('userid')
            let urlForDelete = "http://yiiwebtest.test/comment/delete?id=" + commentId;
            let url = "http://yiiwebtest.test/comment/filter?userId=" + userId;
            $.ajax({
                method: "DELETE",
                url: urlForDelete,
            })
                .done();

            $.getJSON(url, function (data) {
                let html = '';
                $.each(data, function (key, value) {
                    if (value.published == 1) {
                        value.published = 'published';
                    } else {value.published = 'NOT published'}
                    html += '<tr>';
                    html += '<th scope="row">' + value.id + '</th>';
                    html += '<td>' + value.user_id + '</td>';
                    html += '<td>' + value.date + '</td>';
                    html += '<td>' + value.text + '</td>';
                    html += '<td>' + value.published + '</td>';
                    html += '<td class="changePublished" id="'+value.id+'" userid="'+value.user_id+'">'+ value.published +'   CLICK ME TO CHANGE :) '+'</td>';
                    html += '<td><button class="deleteComment" id="' + value.id + '" userid="' + value.user_id + '">Delete comment</button></td>';
                    html += '</tr>';
                });
                $('#comments').html(html);
            });

        });


    });

</script>

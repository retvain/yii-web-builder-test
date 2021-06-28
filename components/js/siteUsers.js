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
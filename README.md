<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
   
</p>

#Задание

Yii2
Разработка REST API и приложения для работы с ним. Основные функции API
Получение данных пользователя (ФИО, дата рождения, город, номер телефона. аватар).
Получение комментариев пользователя (комментарий, дата, статус: опубликован/не опубликован)
Изменение статуса комментария
Удаление комментария Задачи
Настроить Docker-окружение
Разработать базу данных (СУБД на выбор: Mysql, PostgreSQL)
Разработка приложения для работы с API
Разработка REST APIТребования
Разработанные REST Api и приложение должны работать в рамках одного проекта.
Формат обмена данными - JSONПриложение может состоять из одной страницы, на которой будет информация о пользователе и его комментарии. Изменение статуса комментария и удаление - без перезагрузки страницы

####Для создания миграции из консоли:
   yii migrate/create create_users_table --fields="name:string:notNull,born_date:date,city:string,phone_number:string:unique,avatar:string:defaultValue(null)"

   yii migrate/create create_comments_table --fields="user_id:integer:notNull:foreignKey(users),date:date:notNull,text:text,published_at:boolean:notnull"


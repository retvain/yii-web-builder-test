# Задание


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

### Создал миграции из консоли:
    php yii migrate/create create_user_table --fields="name:string:notNull,born_date:date,city:string,phone_number:string:unique,avatar:string:defaultValue(null)"

    php yii migrate/create create_comment_table --fields="user_id:integer:notNull:foreignKey(user),date:date:notNull,text:text,published_at:boolean:notnull"

    php yii migrate

### Seeds для наполнения БД:

    @app/commands/SeedController

    php yii seed

Для запуска данного примера необходимы [docker](https://docs.docker.com/engine/getstarted/step_one/) и [docker-compose](https://docs.docker.com/compose/install/)

Ниже приведу последовательность действий для запуска на Ubuntu

1.Установить docker и docker-compose по ссылкам выше.

2.Создать папку проекта 

```
$ git clone https://github.com/bscheshirwork/petshelter
```

либо вручную, если отсутствует git - из [архива](https://github.com/bscheshirwork/petshelter/archive/master.zip)
В ней `[docker-compose.yml](docker-compose.yml)` служит для установки конфигурации Вашей будущей связки сервисов. Для дебага не забудьте изменить соответствующую переменную окружения, подставив адрес вашей машины вместо указанного для примера.

3.Загрузить и запустить сервис `php`

```
$ cd petshelter
$ docker-compose run php /bin/bash
Creating network "petshelter_default" with the default driver
Creating petshelter_db_1
root@abfe3b3ca645:/var/www/html#
```
4.Загрузить зависимости `composer`в контейнере. Обнление потребует github token (см. [установку yii2](https://github.com/yiisoft/yii2/blob/master/docs/guide-ru/start-installation.md) ), его вы можете найти на своей странице в разделе `https://github.com/settings/tokens`

```
root@abfe3b3ca645:/var/www/html# composer update
```
5.Выполнить установку прав и миграции
```
root@abfe3b3ca645:/var/www/html# chmod go+rw -R web/assets/ runtime/
root@abfe3b3ca645:/var/www/html# chmod +x yii
root@abfe3b3ca645:/var/www/html# ./yii migrate/up
```
> Если Вы хотите запустить на одной машине несколько копий такой сборки - обратите внимани на то, чтобы папки (и соответственно префикс композиции) имели разное название. Также переменные окружения для mysql необходимо дифференцировать по проектам. Несоблюдение данного правила будет приводить к ошибкам подключения к базе. 


6.Выйти из контейнера (`exit`, ctrl+c) и запустить комплекс сервисов
```
$ docker-compose up -d
Creating network "petshelter_default" with the default driver
Creating petshelter_db_1
Creating petshelter_php_1
Creating petshelter_nginx_1
```

Сервис доступен по адресу `0.0.0.0:8080`. 


Для работы с xdebug используются переменные среды.
```
XDEBUG_CONFIG: "remote_host=192.168.1.39 remote_port=9007"
PHP_IDE_CONFIG: "serverName=petshelter"
```
В PHPStorm настроить следующее:
Добавить сервер с указанным в перемнной PHP_IDE_CONFIG именем
`Settings > Languages & Frameworks > PHP > Servers: [Name => petshelter]`
В нём изменить path mapping.
`Settings > Languages & Frameworks > PHP > Servers: [Use path mapping => True, /home/user/petshelter/php-code => /var/www/html]`
Изменить порт по умолчанию 9000 на используемый в настройках
`Settings > Languages & Frameworks > PHP > Debug: [Debug port => 9007]`
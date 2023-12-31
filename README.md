# Админ панель школы

Данный проект представляет собой админ панель, с помощью которой преподаватели смогут хранить файлы в удобном формате. Есть возможность загрузки документов на [Яндекс.Диск](https://disk.yandex.ru), создание событий, сортировка данных по различным фильтрам, а также вывод их в удобном формате.  

## Стек-технологии

Для бекенда используется PHP(v7.4.29-cli) и [Laravel](https://laravel.com/) (v10.0). Также используется пакет [Socialite](https://socialiteproviders.com/) для авторизации в яндексе и [данный репозиторий](https://github.com/leonied7/yandex-disk-api) для работы с API Диска. 

Сервер развернут на серверах .... с установленной системой Ubuntu 20.04.

## Установка и запуск

Для установки проекта требуется иметь 
 - [Laravel](https://laravel.com/)
 - [Composer](https://getcomposer.org/)
 - [Open Server Panel](https://ospanel.io/) (для имитации сервера)
 - [Git](https://git-scm.com)
 - [NodeJs](https://nodejs.org/ru/) (v16.16.0)

После установки Open Server, необходимо зайти в папку `domains` в директории OSPanel, после чего открыть консоль (желательно git bash) и прописать:

```shell
# для загрузки репозитория
git clone https://github.com/Animila/site-school.git
# открываем папку
cd site-school
# устанавливаем все зависимости
composer install
```

Затем мы копируем .env.example и сохраняем там же но под именем .env. Необходимо создать базу данных в PHPMyAdmin, и записать ее в .env файл.


После этого делаем миграцию всех данных (проверяем, что open server запущен):

`php artisan migrate`

И в конце просто генерируем ключ активации:

`php artisan key:generate`


## Использование

При первом запуске и авторизации в системе, необходимо авторизовываться в том аккаунте, через который будет использоваться Yandex.Disk. Также для него будет создан пароль, который уже потом можно будет поменять только в phpmyadmin.


## Авторы

> Иванова Софья: UI/UX дизайнер, Fullstack-разработчик
>
> Христофоров Илья: ТехЛид, Backend-разработчик
>
> Яровенко Анна: менеджер, аналитик
>
> Андреев Эрсан: DevOps, QA

## Лицензия

Данный проект разрабатывается в рамках производственной практики. Все материалы, за исключением лицензированных изображений и материалов компаний и организаций, распространяются по GNU лицензии

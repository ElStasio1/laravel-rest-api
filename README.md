## Чтобы развернуть API нужно:
1. В терминале прописать composer install
<br>1.1 Если выдает ошибки, нужно добавить --ignore-platform-req=php (полная команда composer install --ignore-platform-req=php)
2. В файле .env поменять данные подключения к БД
3. php artisan key:generate
3. php artisan migrate
4. php artisan db:seed

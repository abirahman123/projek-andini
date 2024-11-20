Installation steps:

1. git clone...
2. copy .env.example .env
3. Setting .env and enter your database name
4. open terminal and type: composer install
5. type: php artisan key:generate
6. then type: php artisan migrate:fresh --seed
7. Finally type: php artisan serve

Don't forget to turn on the web server. I use Laragon as a web server.

## Инструкция по развертыванию

- docker-compose up -d --build
- cp .env.example .env
- bash php-fpm composer install
- bash php-fpm php artisan key:generate
- bash php-fpm php artisan migrate
- http://localhost/

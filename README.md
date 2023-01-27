## Инструкция по развертыванию

- docker-compose up -d --build
- cp .env.example .env
- bash php-fpm composer install
- bash php-fpm php artisan key:generate
- bash php-fpm php artisan migrate
- bash php-fpm php artisan db:seed
- http://localhost/

### Тестирование
bash php-fpm php artisan test

### Описание задачи
Разработайте API сервис каталога товаров.

Реализуйте получение дерева категорий и поиск товаров. Авторизация и аутентификация не требуется.

Структура данных:
Дерево категорий бесконечной вложенности с полем index для упорядочивания
Товар имеет название, описание, категорию

Требования:
- PHP 8.1
- Laravel / Symfony
- Postgresql
- реализация http метода для упорядочивания категорий (изменение index и parent_id)
- ответ в формате json

Плюсом будет:
- **Docker**
- **сортировка пользователем товаров по названию (А-Я, Я-А)**
- **автотесты**
- **использование seed для генерации тестовых категорий и товаров**
- **readme для запуска**

Результат выложите на github

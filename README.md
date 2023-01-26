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

### Swagger
Скопировать содержимое файла public/api.yaml и вставить в https://editor.swagger.io/

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
- **swagger документация**
- кеширование
- **Dockerfile**
- поиск товара по названию или полнотекстовый поиск по названию и описанию с использованием ElasticSearch
- **сортировка пользователем товаров по названию (А-Я, Я-А)**
- **автотесты**
- **использование seed для генерации тестовых категорий и товаров**
- **readme для запуска**

Результат выложите на github

FROM php:8.3-cli

RUN apt update && apt install -y \
    git unzip curl libzip-dev libicu-dev

RUN docker-php-ext-install intl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000

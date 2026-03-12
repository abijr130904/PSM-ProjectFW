FROM --platform=linux/amd64 php:8.3-fpm

RUN apt update && apt install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libicu-dev

RUN docker-php-ext-install pdo pdo_mysql intl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y libzip-dev libicu-dev libpng-dev \
    && docker-php-ext-install pcntl zip mysqli pdo pdo_mysql sockets calendar intl gd exif

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html
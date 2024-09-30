FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y libzip-dev libicu-dev libpng-dev \
    && docker-php-ext-install pcntl zip mysqli pdo pdo_mysql sockets calendar intl gd exif

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY ./z_custom.ini /usr/local/etc/php/conf.d/z_custom.ini

RUN sed -i 's/80/8888/' /etc/apache2/ports.conf

RUN a2enmod rewrite

# Экспонируем порт 80 для Apache
EXPOSE 8888
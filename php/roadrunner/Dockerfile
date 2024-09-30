FROM ghcr.io/roadrunner-server/roadrunner:latest AS roadrunner

FROM php:8.2-cli

RUN apt-get update \
    && apt-get install -y libzip-dev libicu-dev libpng-dev \
    && docker-php-ext-install pcntl zip mysqli pdo pdo_mysql sockets calendar intl gd exif

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr

COPY ./z_custom.ini /usr/local/etc/php/conf.d/z_custom.ini

WORKDIR /app

ENTRYPOINT [ "php", "artisan", "octane:roadrunner", "--host=0.0.0.0" ]

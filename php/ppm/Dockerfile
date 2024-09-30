FROM php:8.2-cli

RUN apt-get update \
    && apt-get install -y libzip-dev libicu-dev libpng-dev \
    && docker-php-ext-install pcntl zip mysqli pdo pdo_mysql sockets calendar intl gd exif

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY ./z_custom.ini /usr/local/etc/php/conf.d/z_custom.ini

ARG version=*
ARG http_version=*
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN mkdir /ppm && cd /ppm && composer require php-pm/php-pm:${version} && composer require php-pm/httpkernel-adapter:${http_version}

WORKDIR /var/www/html

COPY --chmod=0755 ./ppm/entrypoint.sh /root/entrypoint.sh

ENTRYPOINT [ "/root/entrypoint.sh" ]
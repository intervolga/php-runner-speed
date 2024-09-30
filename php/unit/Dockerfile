FROM unit:php8.2

RUN apt-get update \
    && apt-get install -y libzip-dev libicu-dev libpng-dev \
    && docker-php-ext-install pcntl zip mysqli pdo pdo_mysql sockets calendar intl gd exif

COPY unit/config.json /docker-entrypoint.d/

COPY ./z_custom.ini /usr/local/etc/php/conf.d/z_custom.ini

WORKDIR /www
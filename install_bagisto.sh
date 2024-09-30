#!/bin/bash

composer install && composer update && php artisan migrate --force && php artisan db:seed --force \
  && php artisan cache:clear && php artisan config:clear \
  && php artisan optimize \
  && yes | php artisan octane:install --server=roadrunner && yes | php artisan octane:install --server=swoole \
  && php artisan vendor:publish --all --force && php artisan storage:link --force && php artisan key:generate --force
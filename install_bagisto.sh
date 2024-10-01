#!/bin/bash

composer install && php artisan migrate --force && php artisan db:seed --force \
  && php artisan cache:clear && php artisan config:clear \
  && yes | php artisan octane:install --server=roadrunner && yes | php artisan octane:install --server=swoole \
  && php artisan vendor:publish --all --force && php artisan storage:link --force && php artisan key:generate --force \
  && php artisan optimize
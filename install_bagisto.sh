#!/bin/bash


composer install && php artisan migrate && php artisan db:seed && php artisan vendor:publish --all && php artisan storage:link && php artisan key:generate \
  && php artisan cache:clear && php artisan config:clear  \
  && yes | php artisan octane:install --server=roadrunner && yes | php artisan octane:install --server=swoole && php artisan db:seed --class=ProductSeeder && php artisan generate:product-links
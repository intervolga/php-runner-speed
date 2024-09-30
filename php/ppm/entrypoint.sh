#!/bin/bash

mkdir -p /ppm/run
chmod -R 777 /ppm/run
ARGS='--port=8080 --host=0.0.0.0 --socket-path=/ppm/run --pidfile=/ppm/ppm.pid --bootstrap=laravel --app-env=prod --debug=0'
/ppm/vendor/bin/ppm start --ansi $ARGS $@
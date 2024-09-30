# PHP server load tests

## Команды для запуска серверов

### FPM
`docker compose -f compose.yml -f compose.fpm.yml up -d --build`

url: fpm-127-0-0-1.nip.io:8080

### Franken
`docker compose -f compose.yml -f compose.franken.yml up -d --build`

url: franken-127-0-0-1.nip.io:8080

### RoadRunner
`docker compose -f compose.yml -f compose.rr.yml up -d --build`

url: rr-127-0-0-1.nip.io:8080

### Swoole
`docker compose -f compose.yml -f compose.swoole.yml up -d --build`

url: swoole-127-0-0-1.nip.io:8080

### Nginx Unit
`docker compose -f compose.yml -f compose.unit.yml up -d --build`

url: unit-127-0-0-1.nip.io:8081

### Apache mod_php
`docker compose -f compose.yml -f compose.apache.yml up -d --build`

url: apache-127-0-0-1.nip.io:8080

## Запуск с установкой
При первом запуске локально необходимо выполнить, чтобы установился Bagisto и выполнились seed'ры

`docker compose -f compose.yml -f compose.fpm.yml -f compose.init.yml up -d --build`

После скопировать содержимое app/storage/product_links.txt в tank/uris.txt

При тестировании Yandex tank необходимо заменить Host в tank/load.yaml на тестируемый.


## Доступ в админку

{url}:8080/admin

login: `admin@example.com`

pw: `admin123`

## Результаты тестов

| Сервер              | AVG CPU (%)   | AVG RAM (mb)    | AVG RPS              | Результат yandex tank    |
|---------------------|---------------|-----------------|----------------------|--------------------------|
| fpm                 | 81            | 3106,763063     | 39.10113393459943    | https://clck.ru/3DaTdo   |
| franken             | 44            | 856,7777778     | 115.93016905966681   | https://clck.ru/3DWrG5   |
| RoadRunner          | 46            | 549,4125        | 118.82664528965924   | https://clck.ru/3DWuTX   |
| swoole              | 41            | 716,7181818     | 127.51062587535598   | https://clck.ru/3DWta8   |
| Nginx unit          | 90            | 887,0657627     | 37.85367205699279    | https://clck.ru/3DYPcg   |
| Apache mod_php      | 80            | 5070,229699     | 35.102209383571086   | https://clck.ru/3DaNS3   |


### График использования CPU
<img src = "screenshots/cpu_usage.png"><br>

### График использования памяти
<img src = "screenshots/ram_usage.png"><br>

### График времени ответов от сервера
<img src = "screenshots/ttr.png"><br>
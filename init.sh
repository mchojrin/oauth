#!/usr/bin/env bash

docker-compose up
docker-compose exec client "composer install"
docker-compose exec server "composer install"
docker-compose exec server "chown www-data.www-data /var/www/html/private.key"

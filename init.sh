#!/usr/bin/env bash

set -x

sudo chown www-data:www-data private.key
docker-compose up
docker-compose exec client composer install
docker-compose exec server composer install
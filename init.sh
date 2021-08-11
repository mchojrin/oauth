#!/usr/bin/env bash

set -x

docker-compose up
docker-compose exec client composer install
docker-compose exec server composer install
chown -r $(docker-compose exec server id -u) private.key

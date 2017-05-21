#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

DOCKER="docker-compose -f ./docker-compose.yml -p medzoner.com"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

##vendors
${DOCKER} run --user www-data php-medzoner composer install
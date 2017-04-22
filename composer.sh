#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

COMPOSE_PATH=$PATHBASE'/docker-compose.yml'
DOCKER="docker-compose"
BUILDFLAGS="-f ${COMPOSE_PATH} -p medzoner.com"

PROJECT_NAME=
APP_PATH=

NGINX_HOST=localhost
NGINX_PATH=

cd ${PATHBASE}

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

##vendors
printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} run php --user www-data composer install"
${DOCKER} ${BUILDFLAGS} run --user www-data php-medzoner composer install
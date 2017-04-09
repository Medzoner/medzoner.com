#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

COMPOSE_PATH=$PATHBASE'/docker-compose.yml'
DOCKER="docker-compose"
BUILDFLAGS="-f ${COMPOSE_PATH} -p medzoner.com"
PHP_USER_CMD="/usr/local/bin/gosu www-data"

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

#force recreate to
${DOCKER} ${BUILDFLAGS} rm -f
${DOCKER} ${BUILDFLAGS} pull

#build and run
${DOCKER} ${BUILDFLAGS} build

${DOCKER} ${BUILDFLAGS} up -d --force-recreate

##vendors
printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} run php ${PHP_USER_CMD} composer install"
${DOCKER} ${BUILDFLAGS} run php ${PHP_USER_CMD} composer install
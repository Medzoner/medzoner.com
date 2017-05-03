#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

DOCKER="docker-compose -f ./docker-compose.yml -p medzoner.com"
DOCKER_EXEC="${DOCKER} exec -T --user www-data php-medzoner "

PROJECT_NAME=
APP_PATH=

NGINX_HOST=localhost
NGINX_PATH=

SF_ENV=--env=prod

cd ${PATHBASE}

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

#force recreate to
${DOCKER} rm -f
${DOCKER} pull

#build and run
${DOCKER} build
${DOCKER} up -d --force-recreate

##vendors
${DOCKER_EXEC} composer install
${DOCKER_EXEC} php app/console doctrine:database:create --if-not-exists ${SF_ENV}
${DOCKER_EXEC} php app/console doctrine:schema:update --force ${SF_ENV}

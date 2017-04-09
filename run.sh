#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose.yml -p medzoner.com"

BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

COMPOSE_PATH=$PATHBASE'/docker-compose.yml'

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
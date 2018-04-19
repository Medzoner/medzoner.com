#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose-local.yml -p medzoner.com"

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

${DOCKER} run --user www-data php composer install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader



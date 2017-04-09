#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose.yml -p medzoner.com"
PHP_USER_CMD="/usr/local/bin/gosu www-data"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

#docker
${DOCKER} ${BUILDFLAGS} run php-medzoner ${PHP_USER_CMD} bash

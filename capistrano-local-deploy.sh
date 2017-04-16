#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose.yml -p medzoner.com"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

#docker
${DOCKER} ${BUILDFLAGS} run capistrano-medzoner cap local deploy

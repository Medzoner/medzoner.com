#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose.yml -p medzoner.com"

source "./.env"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

${DOCKER} stop capistrano-medzoner
${DOCKER} rm -f capistrano-medzoner
${DOCKER} pull

#docker
${DOCKER} run --user www-data capistrano-medzoner cap production deploy

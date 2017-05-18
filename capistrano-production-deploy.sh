#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose-deploy.yml -p medzoner.com"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

${DOCKER} stop capistrano-medzoner
${DOCKER} rm -f capistrano-medzoner
${DOCKER} pull

#docker
${DOCKER} run capistrano-medzoner cap production deploy

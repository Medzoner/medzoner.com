#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose-deploy.yml -p medzoner.com"

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

${DOCKER} ${BUILDFLAGS} stop capistrano-medzoner
${DOCKER} ${BUILDFLAGS} rm -f capistrano-medzoner
${DOCKER} ${BUILDFLAGS} pull

#docker
${DOCKER} ${BUILDFLAGS} run capistrano-medzoner cap production deploy

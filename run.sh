#!/usr/bin/env bash

export REMOTE_HOST=$(docker network inspect bridge -f '{{range .IPAM.Config}}{{.Gateway}}{{end}}')
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

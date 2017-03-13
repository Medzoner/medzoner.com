#!/usr/bin/env bash

DOCKER="docker-compose"
BUILDFLAGS="-f ./docker-compose.yml -p docker-medzoner"

#docker
${DOCKER} ${BUILDFLAGS} run composer bash

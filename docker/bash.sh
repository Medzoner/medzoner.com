#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose.yml -p medzoner.com"

#docker
${DOCKER} exec --user www-data php bash

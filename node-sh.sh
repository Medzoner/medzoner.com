#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose-node.yml -p medzoner.com"

${DOCKER} run --user="node" --rm site bash

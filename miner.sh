#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose-node.yml -p medzoner.com"

${DOCKER} run --rm site npm run miner

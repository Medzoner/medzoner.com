#!/usr/bin/env bash

DOCKER="docker-compose -f ./docker-compose-node.yml -p medzoner.com"

# initialise le projet
${DOCKER} run --rm site npm install
${DOCKER} run --rm site bower install

# pour lancer le "gulp serve" de base
${DOCKER} up


# pour lancer les tests
${DOCKER} run --rm site gulp
${DOCKER} run --rm site gulp watch

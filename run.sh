#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

DOCKER="docker-compose -f ./docker-compose.yml -p medzoner.com"

PROJECT_NAME=
APP_PATH=

NGINX_HOST=localhost
NGINX_PATH=

SF_ENV=--env=prod

cd ${PATHBASE}

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

#force recreate to
${DOCKER} rm -f
${DOCKER} pull

#build and run
${DOCKER} build

${DOCKER} up -d --force-recreate

##vendors
printf "[CMD] %s\n" "${DOCKER} run --user www-data php composer install"
${DOCKER} exec -T --user www-data php-medzoner composer install

#database init if not exists
printf "[CMD] %s\n" "${DOCKER} exec -T --user www-data php  php app/console doctrine:database:create --if-not-exists ${SF_ENV}"
${DOCKER} exec -T --user www-data php-medzoner php app/console doctrine:database:create --if-not-exists ${SF_ENV}

#database schema
printf "[CMD] %s\n" "${DOCKER} exec -T --user www-data php  php app/console doctrine:schema:update --force ${SF_ENV}"
${DOCKER} exec -T --user www-data php-medzoner php app/console doctrine:schema:update --force ${SF_ENV}

#database fixtures
#printf "[CMD] %s\n" "${DOCKER} exec -T php ${PHP_USER_CMD}  php app/console doctrine:fixtures:load ${SF_ENV}"
#${DOCKER} exec -T --user www-data php-medzoner ${PHP_USER_CMD} php app/console doctrine:fixtures:load ${SF_ENV}


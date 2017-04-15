#!/usr/bin/env bash


BASE_PROJECT_UID=0

source "./.env"

CONTAINER_HOME_PATH=/home/www-data

COMPOSE_PATH=$PATHBASE'/docker-compose.yml'
DOCKER="docker-compose"
BUILDFLAGS="-f ${COMPOSE_PATH} -p medzoner.com"
PHP_USER_CMD="/usr/local/bin/gosu www-data"

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
${DOCKER} ${BUILDFLAGS} rm -f
${DOCKER} ${BUILDFLAGS} pull

#build and run
${DOCKER} ${BUILDFLAGS} build

${DOCKER} ${BUILDFLAGS} up -d --force-recreate

##vendors
printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} run php ${PHP_USER_CMD} composer install"
${DOCKER} ${BUILDFLAGS} run --user www-data php-medzoner composer install

#database init if not exists
printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} exec -T php ${PHP_USER_CMD}  php app/console doctrine:database:create --if-not-exists ${SF_ENV}"
${DOCKER} ${BUILDFLAGS} exec -T php-medzoner ${PHP_USER_CMD} php app/console doctrine:database:create --if-not-exists ${SF_ENV}

#database schema
printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} exec -T php ${PHP_USER_CMD}  php app/console doctrine:schema:update --force ${SF_ENV}"
${DOCKER} ${BUILDFLAGS} exec -T php-medzoner ${PHP_USER_CMD} php app/console doctrine:schema:update --force ${SF_ENV}

#database fixtures
#printf "[CMD] %s\n" "${DOCKER} ${BUILDFLAGS} exec -T php ${PHP_USER_CMD}  php app/console doctrine:fixtures:load ${SF_ENV}"
#${DOCKER} ${BUILDFLAGS} exec -T php-medzoner ${PHP_USER_CMD} php app/console doctrine:fixtures:load ${SF_ENV}


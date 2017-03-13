#!/usr/bin/env bash

source "./app/config/config.conf"

cd ${PATHBASE}

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

source "${PATHBASE}/lib/lib.sh"

function fullInstall() {
    echo "================================================= INIT PROJET =================================================";
    symfonyInit ${PROJECTS} ${PATH_PROJECTS} ${PATH_CONTAINERS} ${PATHBASE}

    echo "================================================= START PROXY =================================================";
    proxyInit ${PATHBASE}

    echo "================================================= CONFIG IDE ==================================================";
    configIde ${BASE_XDEBUG_PORT} ${PATH_PROJECTS} ${PATH_CONTAINERS} ${PATHBASE} ${BASE_HTTP_PORT}
}

fullInstall

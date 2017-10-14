#!/usr/bin/env bash

source ./.env

docker build ./docker/coinhive
#./node_modules/coin-hive/bin/coin-hive ${COINHIVE_SITE_KEY}
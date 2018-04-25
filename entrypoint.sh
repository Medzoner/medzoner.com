#!/bin/sh

if [ ! -f /var/www/app/config/parameters.yml ]; then
    cp -f /config/parameters.yml /var/www/app/config/parameters.yml
fi

exec "$@"

#!/bin/sh

rm -rf /var/www/*
cp -rf /data/. /var/www/.

if [ -f /var/www/app/config/parameters.yml ]; then
    rm -f /var/www/app/config/parameters.yml
fi

if [ ! -f /var/www/app/config/parameters.yml ]; then
    cp -f /config/parameters.yml /var/www/app/config/parameters.yml
fi

chown -R www-data:www-data /var/www
rm -rf /var/www/app/cache/*
rm -rf /var/www/app/logs/*

exec "$@"

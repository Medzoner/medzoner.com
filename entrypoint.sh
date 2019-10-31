#!/bin/sh

rm -rf /var/www/*
cp -rf /data/. /var/www/.

if [ -f /var/www/config/parameters.yml ]; then
    rm -f /var/www/config/parameters.yml
fi

if [ ! -f /var/www/config/parameters.yml ]; then
    cp -f /config/parameters.yml /var/www/config/parameters.yml
fi

chown -R www-data:www-data /var/www
rm -rf /var/www/var/cache/*
rm -rf /var/www/var/logs/*


exec "$@"

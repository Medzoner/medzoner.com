#!/bin/sh

rm -rf /var/www/*
cp -rf /data/. /var/www/.

chown -R www-data:www-data /var/www
rm -rf /var/www/var/cache/*
rm -rf /var/www/var/logs/*

exec "$@"

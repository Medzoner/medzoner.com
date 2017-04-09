#!/usr/bin/env bash

#replace vhost hostname by the one provided in env
sed -i "s/{{NGINX_HOST}}/$NGINX_HOST/g" /etc/nginx/conf.d/default.conf

sed -i "s/{{NGINX_PATH}}/$(echo "$NGINX_PATH" | sed 's_/_\\/_g')/g" /etc/nginx/conf.d/default.conf

exec "$@"
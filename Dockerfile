FROM alpine:latest as build

RUN mkdir -p /var/www
RUN mkdir -p /data

COPY app /data/app
COPY src /data/src
COPY bin /data/bin
COPY composer.json /data/
COPY composer.lock /data/
COPY vendor /data/vendor

COPY web/app.php /data/web/app.php

COPY assets/rev-manifest-css.json /data/assets/rev-manifest-css.json
COPY assets/rev-manifest-js.json /data/assets/rev-manifest-js.json

RUN addgroup -g 1000 www-data && \
    adduser -D -u 1000 -G www-data www-data

FROM medzoner/medzoner_php
COPY --from=build \
     /data \
     /var/www/html

RUN rm -rf /var/www/html/app/config/parameters.yml

WORKDIR /var/www


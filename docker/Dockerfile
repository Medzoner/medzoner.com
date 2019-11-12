FROM l24624j7.gra5.container-registry.ovh.net/medzoner/php:v2 AS build

RUN mkdir -p /var/www
RUN mkdir -p /data

WORKDIR /data

COPY ./app /data/app
COPY ./src /data/src
COPY ./bin /data/bin
COPY ./translations /data/translations
COPY ./config /data/config
COPY ./composer.json /data/
COPY ./composer.lock /data/

COPY ./web/rev-manifest-css.json /data/web/rev-manifest-css.json
COPY ./web/rev-manifest-js.json /data/web/rev-manifest-js.json
COPY ./web/index.php /data/web/index.php
COPY ./web/bundles /data/web/bundles
COPY ./web/css /data/web/css
COPY ./web/fonts /data/web/fonts
COPY ./web/images /data/web/images
COPY ./web/js /data/web/js
COPY ./web/favicon.png /data/web/favicon.png
COPY ./web/robots.txt /data/web/robots.txt

RUN mkdir -p /config

WORKDIR /var/www

#entry point
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]

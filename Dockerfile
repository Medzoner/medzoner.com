FROM l24624j7.gra5.container-registry.ovh.net/medzoner/php:v2 AS build

RUN mkdir -p /var/www
RUN mkdir -p /data

WORKDIR /data

COPY app /data/app
COPY src /data/src
COPY bin /data/bin
COPY composer.json /data/
COPY composer.lock /data/

COPY assets/rev-manifest-css.json /data/assets/rev-manifest-css.json
COPY assets/rev-manifest-js.json /data/assets/rev-manifest-js.json
COPY web/app.php /data/web/app.php
COPY web/assets /data/web/assets
COPY web/bundles /data/web/bundles
COPY web/css /data/web/css
COPY web/fonts /data/web/fonts
COPY web/images /data/web/images
COPY web/js /data/web/js
COPY web/favicon.png /data/web/favicon.png
COPY web/robots.txt /data/web/robots.txt

RUN mkdir -p /config
COPY config/parameters.yml.dist /config/parameters.yml

WORKDIR /var/www

#entry point
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


CMD ["php-fpm"]

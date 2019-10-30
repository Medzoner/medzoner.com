FROM l24624j7.gra5.container-registry.ovh.net/medzoner/php:v2 AS build

RUN mkdir -p /var/www
RUN mkdir -p /data

WORKDIR /data

COPY app /data/app
COPY src /data/src
COPY bin /data/bin
COPY composer.json /data/
COPY composer.lock /data/

COPY web/app.php /data/web/app.php

COPY assets/rev-manifest-css.json /data/assets/rev-manifest-css.json
COPY assets/rev-manifest-js.json /data/assets/rev-manifest-js.json

COPY web/css /data/web/assets/css
COPY web/js /data/web/assets/js
COPY web/images /data/web/assets/images
COPY web/favicon.png /data/web/assets/favicon.png

RUN mkdir -p /config
COPY app/config/parameters.yml.dist /config/parameters.yml

WORKDIR /var/www

#entry point
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


CMD ["php-fpm"]

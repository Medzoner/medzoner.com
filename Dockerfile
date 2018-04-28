FROM alpine:latest

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

RUN mkdir -p /config
COPY app/config/parameters.yml.dist /config/parameters.yml

RUN addgroup -g 1000 www-data && \
    adduser -D -u 1000 -G www-data www-data

WORKDIR /var/www

#entry point
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["/bin/sh"]

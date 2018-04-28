FROM alpine:latest

RUN mkdir -p /var/www

COPY app /var/www/app
COPY assets/rev-manifest-css.json /var/www/assets/rev-manifest-css.json
COPY assets/rev-manifest-js.json /var/www/assets/rev-manifest-js.json
COPY web/app.php /var/www/web/app.php
COPY src /var/www/src
COPY bin /var/www/bin
COPY composer.json /var/www/
COPY composer.lock /var/www/
COPY vendor /var/www/vendor

RUN mkdir -p /config
COPY app/config/parameters.yml.dist /config/parameters.yml

RUN addgroup -g 1000 www-data && \
    adduser -D -u 1000 -G www-data www-data

RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /config

WORKDIR /var/www

#entry point
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

FROM alpine:latest

RUN mkdir -p /var/www

COPY app /var/www/app
COPY web /var/www/web
COPY src /var/www/src
COPY assets /var/www/assets
COPY bin /var/www/bin
COPY composer.json /var/www/
COPY composer.lock /var/www/
COPY vendor /var/www/vendor

RUN addgroup -g 1000 www-data && \
    adduser -D -u 1000 -G www-data www-data

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www

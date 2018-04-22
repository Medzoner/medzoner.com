FROM alpine:latest

ENV SSH_AUTH_SOCK /ssh-agent
ENV SSH_PRIVATE_KEY /home/www-data/private_key

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www

RUN mkdir -p /var/www

COPY app /var/www/app
COPY web /var/www/web
COPY src /var/www/src
COPY assets /var/www/assets
COPY bin /var/www/bin
COPY composer.json /var/www/
COPY composer.lock /var/www/
COPY vendor /var/www/vendor

WORKDIR /var/www

VOLUME /var/www

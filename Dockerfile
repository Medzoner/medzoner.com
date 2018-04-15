FROM medzoner/medzoner_php

RUN mkdir -p /var/www

COPY app /var/www/app
COPY web /var/www/web
COPY src /var/www/src
COPY assets /var/www/assets
COPY bin /var/www/bin
COPY composer.json /var/www/
COPY composer.lock /var/www/
COPY vendor /var/www/vendor

VOLUME /data

WORKDIR /var/www

#RUN composer install

#RUN php app/console server:start -p 9000

EXPOSE 9000
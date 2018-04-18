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

RUN chown -R www-data:www-data /var/www

VOLUME /data

WORKDIR /var/www

#RUN composer install

RUN php /var/www/app/console server:start -p 9000

EXPOSE 9000
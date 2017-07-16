FROM medzoner/medzoner_php:7.0

RUN pecl install mongodb

RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini
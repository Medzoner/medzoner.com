FROM medzoner/medzoner_php


# Conf php
COPY php.ini $PHP_INI_DIR/conf.d/php.ini
COPY xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini
COPY php-fpm.d/docker.conf $PHP_INI_DIR/../php-fpm.d/www.conf

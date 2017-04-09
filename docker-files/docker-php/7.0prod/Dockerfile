FROM php:7.0-fpm

# common
RUN apt-get update && \
    apt-get install -y --no-install-recommends ca-certificates wget \
        curl \
        ntp \
        # for intl extension
        libicu-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng12-dev \
        libfreetype6-dev \
        libssl-dev \
        # for mcrypt extension
        libmcrypt-dev \
        libmagickwand-dev \
        && rm -r /var/lib/apt/lists/*

# Install the PHP extention
RUN docker-php-ext-install mcrypt bcmath intl pdo_mysql \
    && docker-php-ext-configure bcmath --enable-bcmath \
    && docker-php-ext-configure intl --enable-intl \
    && docker-php-ext-install gd \
    && docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install opcache \
    && docker-php-ext-install soap \
    && docker-php-ext-install exif \
    && pecl install imagick-beta \
    && docker-php-ext-enable imagick

##php conf
COPY ./*.ini /usr/local/etc/php/conf.d/


#fix error log in no root user
COPY ./php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# Grab gosu for easy step-down from root
#https://github.com/tianon/gosu
ENV GOSU_VERSION 1.9
RUN set -x \
    && dpkgArch="$(dpkg --print-architecture | awk -F- '{ print $NF }')" \
    && wget -O /usr/local/bin/gosu "https://github.com/tianon/gosu/releases/download/$GOSU_VERSION/gosu-$dpkgArch" \
    && wget -O /usr/local/bin/gosu.asc "https://github.com/tianon/gosu/releases/download/$GOSU_VERSION/gosu-$dpkgArch.asc" \
    && export GNUPGHOME="$(mktemp -d)" \
    && gpg --keyserver ha.pool.sks-keyservers.net --recv-keys B42F6819007F00F88E364FD4036A9C25BF357DD4 \
    && gpg --batch --verify /usr/local/bin/gosu.asc /usr/local/bin/gosu \
    && rm -r "$GNUPGHOME" /usr/local/bin/gosu.asc \
    && chmod +x /usr/local/bin/gosu \
    && gosu nobody true

RUN usermod -u 1000 www-data

RUN echo "Europe/Paris" > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

#entry point
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set up the command arguments.
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]

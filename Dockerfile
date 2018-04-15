FROM medzoner/base

RUN mkdir -p /var/www

COPY . /var/www

VOLUME /data

WORKDIR /

EXPOSE 9000

ENTRYPOINT ["/medzoner"]
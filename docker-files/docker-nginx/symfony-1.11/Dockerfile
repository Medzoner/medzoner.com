FROM nginx:1.11

ENV STAGING_ENV prod

COPY nginx.conf /etc/nginx/nginx.conf

#vhost
COPY ./conf.d/*.conf /etc/nginx/conf.d/
COPY ./default.${STAGING_ENV}.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/symfony

RUN cd /var/www

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www

COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["nginx", "-g", "daemon off;"]

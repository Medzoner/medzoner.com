FROM nginx:1.11

COPY nginx.conf /etc/nginx/nginx.conf

#vhost
COPY default.conf /etc/nginx/conf.d/default.conf
COPY ./conf.d/*.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/symfony

RUN cd /var/www

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www

COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["nginx", "-g", "daemon off;"]

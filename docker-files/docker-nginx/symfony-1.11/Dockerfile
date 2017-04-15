FROM nginx:1.11

RUN mkdir -p /var/www/symfony

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www

CMD ["nginx", "-g", "daemon off;"]

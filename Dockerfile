FROM php:7.3-fpm-alpine

WORKDIR /var/www/html

COPY . /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
FROM php:7.0-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install pdo

COPY . /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
FROM php:7.3-fpm-alpine

WORKDIR /var/www/html

COPY . /var/www/html

RUN apk update && apk add --no-cache icu-dev && docker-php-ext-install intl

RUN chmod 777 -R /var/www/html/protected/runtime

EXPOSE 9000

CMD ["php-fpm"]
FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

COPY front .

RUN apk add --no-cache --update --virtual buildDeps autoconf g++ make linux-headers git unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /tmp/pear \
    && apk del buildDeps

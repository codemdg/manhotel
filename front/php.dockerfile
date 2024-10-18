FROM php:8.3-fpm-apline

WORKDIR /var/www/html

COPY front .

RUN apk add --no-cache --update --virtual buildDeps autoconf g++ make linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /tmp/pear \
    && apk del buildDeps

RUN addgroup -g 1000 codemdg && adduser -G codemdg -g codemdg -s /bin/sh -D codemdg

USER codemdg
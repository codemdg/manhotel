FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

COPY front .

RUN apk add --no-cache --update --virtual buildDeps autoconf g++ make linux-headers git unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /tmp/pear \
    && apk del buildDeps

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Install Phpactor via Composer globally
RUN composer global require phpactor/phpactor

# Ensure Composer global bin is in PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

RUN addgroup -g 1000 codemdg && adduser -G codemdg -g codemdg -s /bin/sh -D codemdg

USER codemdg
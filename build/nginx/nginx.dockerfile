FROM nginx:stable-alpine

WORKDIR /etc/nginx/cond.d

COPY nginx/conf.d/nginx.conf .

RUN mv nginx.conf default.conf

WORKDIR /var/www/html

COPY front .


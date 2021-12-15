FROM php:8.0.5-fpm-alpine3.13

ENV TZ Asia/Tokyo
ENV COMPOSER_ALLOW_SUPERUSER 1

# install Lib
RUN apk update && \
    apk add --no-cache --virtual .php-builds oniguruma-dev postgresql-dev git curl zip unzip

# add php,apache-module
RUN docker-php-ext-install mbstring pdo pdo_pgsql && \
    docker-php-ext-enable mbstring

COPY conf/php.ini /usr/local/etc/php/php.ini
COPY conf/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

# install node.js
RUN apk add --update nodejs nodejs-npm

WORKDIR /app


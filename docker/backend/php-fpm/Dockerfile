FROM php:8.1-fpm

RUN docker-php-ext-install pdo_mysql mysqli
RUN pecl install redis
RUN docker-php-ext-enable  redis

WORKDIR /app

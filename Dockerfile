FROM php:7.4-apache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql json \
&& a2enmod rewrite
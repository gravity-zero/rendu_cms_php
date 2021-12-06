FROM php:7.4-apache

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql json \
&& a2enmod rewrite
RUN composer install
RUN composer dump-autoload --optimize
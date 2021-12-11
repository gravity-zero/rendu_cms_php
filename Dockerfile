FROM php:7.4-apache

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql json \
&& a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

COPY ./src/composer.json ./
COPY ./src/composer.lock ./

RUN composer install --no-interaction -o
RUN composer dump-autoload --optimize
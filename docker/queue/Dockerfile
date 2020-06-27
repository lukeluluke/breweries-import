FROM php:7.4-fpm

#db driver
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

WORKDIR /var/www/html


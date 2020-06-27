FROM php:7.4-fpm

RUN apt-get update

RUN apt-get install -qq git curl libmcrypt-dev libjpeg-dev libpng-dev libfreetype6-dev libbz2-dev

#db driver
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

#Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

#Add xdebug config
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

#Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1



WORKDIR /var/www/html


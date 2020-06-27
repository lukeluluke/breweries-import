FROM php:7.4-fpm

WORKDIR /var/www/html

# cron
RUN apt-get update && apt-get -y install cron

#db driver
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

ADD ./scheduler /etc/cron.d/scheduler

RUN chmod 0644 /etc/cron.d/scheduler

RUN crontab /etc/cron.d/scheduler

CMD ["cron", "-f"]

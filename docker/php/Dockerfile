FROM php:8.2-fpm-alpine

ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN apk update \
    && apk add libzip-dev oniguruma-dev \
    && docker-php-ext-install zip mysqli pdo_mysql

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer
RUN composer self-update
RUN composer update
RUN echo 'memory_limit = 1G' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;
RUN chmod -R 0777 /var/www/html/storage
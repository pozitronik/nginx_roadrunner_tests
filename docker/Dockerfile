FROM ghcr.io/roadrunner-server/roadrunner:2023.1.0 as rr
FROM php:8.2-cli
RUN apt-get update \
    && apt-get install -y nano vim wget git unzip zlib1g-dev libpng-dev libzip-dev libpq-dev \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && printf "\n" | pecl install apcu-5.1.21 \
    && docker-php-ext-enable apcu

RUN docker-php-ext-install pdo pdo_mysql bcmath zip gd sockets pdo_pgsql pgsql

# Copy RoadRunner
COPY --from=rr /usr/bin/rr /usr/bin/rr

ADD php/php.ini /usr/local/etc/php/php.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN curl --remote-name ./php/cacert.pem https://curl.se/ca/cacert.pem

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

#RUN composer install --no-dev --optimize-autoloader --no-interaction

CMD ["/usr/bin/rr", "serve", "-d", "-c", ".rr.yaml"]
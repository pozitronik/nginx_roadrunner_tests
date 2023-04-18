FROM php:8.2-cli

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN curl --remote-name ./php/cacert.pem https://curl.se/ca/cacert.pem

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www
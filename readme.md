This container contains environments for performance testing between nginx+php-fmp and roadrunner+php-cli.

Test endpoints:

# nginx+php-fpm

* Raw PHP 'Hello, world': http://localhost:8081/nginx.php
* Yii2 'Hello, world': http://localhost:8081

# roadrunner+php-cli

* Simple 'Hello, world': http://localhost:8080
* Yii2 'Hello, world': http://localhost:8082

It is possible to add delay to the every request in the every script. Write the required delay (in nanoseconds) to `delay.php` file.
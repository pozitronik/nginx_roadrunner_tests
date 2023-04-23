This container contains environments for performance testing between nginx+php-fmp and roadrunner+php-cli.

Test endpoints:

# nginx+php-fpm

* Raw PHP 'Hello, world': http://localhost:8081/nginx.php
* Yii2 'Hello, world': http://localhost:8081

# roadrunner+php-cli

* Simple 'Hello, world': http://localhost:8080
* Yii2 'Hello, world': http://localhost:8082

It is possible to add delay to the every request in the every script. Write the required delay (in nanoseconds) to `delay.php` file.

# How to run benchmark

You can use any benchmark you want. The simplest tool is [ab](https://httpd.apache.org/docs/2.4/programs/ab.html):

`ab -n 100000 -c 1000 %endpoint%`
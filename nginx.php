<?php
declare(strict_types = 1);

$delay = require __DIR__.'/delay.php';

if (true === time_nanosleep(0, $delay??0)) {
	echo "hello world";
}



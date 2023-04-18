<?php
declare(strict_types = 1);

use Nyholm\Psr7\Response;
use Spiral\RoadRunner;
use Nyholm\Psr7;
use Spiral\RoadRunner\Http\PSR7Worker;

include __DIR__."/vendor/autoload.php";

$worker = RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$worker = new PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

while ($req = $worker->waitRequest()) {
	try {
		$rsp = new Response();
		$rsp->getBody()->write('Hello world!');

		$worker->respond($rsp);
	} catch (Throwable $e) {
		$worker->getWorker()->error((string)$e);
	}
}
<?php
declare(strict_types = 1);

use Ajgarlag\Psr15\Dispatcher\Pipe;
use Middlewares\ResponseTime;
use Middlewares\Uuid;
use yii\Psr7\web\Application;
use Spiral\RoadRunner;
use Nyholm\Psr7;
use Spiral\RoadRunner\Http\PSR7Worker;

ini_set('display_errors', 'stderr');
defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/vendor/yiisoft/yii2/Yii.php';
$config = require_once __DIR__.'/config/web.php';

$worker = RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$worker = new PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

$application = (new Application($config));

// Handle each HTTP request from RoadRunner
while ($request = $worker->waitRequest()) {
	try {
		// Without a PSR-15 dispatcher
		$response = $application->handle($request);

		$worker->respond($response);
	} catch (Throwable $e) {
		$worker->getWorker()->error((string)$e);
	}

	if ($application->clean()) {
		$worker->getWorker()->stop();
		return;
	}
}

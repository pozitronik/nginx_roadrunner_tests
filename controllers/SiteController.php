<?php
declare(strict_types = 1);

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * class SiteController
 */
class SiteController extends Controller {

	/**
	 * @return string
	 */
	public function actionError():string {
		$exception = Yii::$app->errorHandler->exception;

		if (null !== $exception) {
			return Html::encode($exception->getMessage());
		}
		return "Status: {$exception->statusCode}";
	}

	/**
	 * @return string
	 */
	public function actionIndex():string {
		if (true === time_nanosleep(0, Yii::$app->params['delay']??0)) {
			return 'hello, yii';
		}
		return 'no delay';
	}
}


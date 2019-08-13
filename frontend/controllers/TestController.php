<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;

/**
 * 
 */

class TestController extends Controller
{
	
	public function actionIndex($max = 20)
	{
		$max = Yii::$app->params['maxNewsInList'];
		$list = Test::getNewsList($max);

		return $this->render('index',[
			'list' => $list,
		]
	);
	}

	public function actionView ($id)
	{
		$item = Test::getItem($id);

		return $this->render('view', [
			'item' => $item
		]);
	}

	public function actionMail() 

	{

		$result = Yii::$app->mailer->compose()
                ->setFrom('anatomists@mail.ru')
                ->setTo('anatomists@mail.ru')
                ->setSubject('Тема сообщения')
                ->setTextBody('Текст сообщения')
                ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
                ->send();
        var_dump($result);
        
	}
}
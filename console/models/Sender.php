<?php 

namespace console\models;

use Yii;


class Sender 
{
	public static function run($subscribers, $newsList)
	{
		foreach ($subscribers as $subscriber) {
		
		$result = Yii::$app->mailer->compose('/mailer/newlist', [
			'newsList' => $newsList,
		])
                ->setFrom('anatomists@mail.ru')
                ->setTo($subscriber['email'])
                ->setSubject('Тема сообщения')
                ->send();
        var_dump($result);
        }
	}
}
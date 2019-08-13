<?php 

namespace console\controllers;


use Yii;
use console\models\News;
/**
 * 
 */
class MailerController extends \yii\console\Controller
{
	
	public function actionSend()
	{
                $list = News::getList();
                print_r($list);
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

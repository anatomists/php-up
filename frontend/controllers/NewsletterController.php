<?php 

namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use frontend\models\Subscribe;


/**
 * 
 */
class NewsletterController extends Controller
{
	
	public function actionSubscribe()
	{
		$formData = Yii::$app->request->post();
		$model = new Subscribe();


		if (Yii::$app->request->isPost) {
			
			$model->email = $formData['email'];

			if ($model->validate() && $model->save()) {

				Yii::$app->session->setFlash('success', 'Subscibe completed!');
			}

		}
		
		return $this->render('subscribe', [
			'model' => $model,


		]);
	}
}
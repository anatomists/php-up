<?php 

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Employee;
use frontend\models\example\Human;
use frontend\models\example\Animal;
use Yii;
/**
 * 
 */
class EmployeeController extends Controller
{
	public function actionIndex()
	{
		$employee1 = new Employee;
		$employee1->firstName = 'George';
		$employee1->lastName = 'P';
		$employee1->middleName = 'O';
		$employee1->salary = '1000';

		echo $employee1['salary'];

		echo '<hr>';

		foreach ($employee1 as $attribute => $value) {
			echo "$attribute: $value <br>";
			}
			$array = $employee1->toArray();
			echo '<pre>';
			print_r($array);
			echo '<pre>';
		
	}
	public function actionTest()
	{
		$human1 = new Human();
		$animal1 = new Animal();

		$animal1->walk();
		echo '<br>';

		$human1->walk();
	}
	public function actionRegister()
	{
		$model = new Employee();
		$model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;
		$formData = Yii::$app->request->post();
		
		if (Yii::$app->request->isPost) {
			
			$model->attributes = $formData;

			if ($model->validate() && $model->save()){
				Yii::$app->session->setFlash('success', 'Registered!');
			}
		}

		return $this->render('register', [
			'model' => $model,
	]);
	}
	public function actionUpdate()
	{
		{
		$model = new Employee();
		$model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;
		$formData = Yii::$app->request->post();
		
		if (Yii::$app->request->isPost) {
			
			$model->attributes = $formData;

			if ($model->validate() && $model->save()){
				Yii::$app->session->setFlash('success', 'Data updated!');
			}
		}

		return $this->render('update', [
			'model' => $model,
	]);
	}
	}
}

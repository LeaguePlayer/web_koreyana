<?php

class VacansyController extends FrontController
{
	public $layout='//layouts/simple';

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','AjaxAddVacancy'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel('Vacansy', $id),
		));
	}

	
	public function actionIndex()
	{
		$models=Job::model()->findAll('status=1');

		$this->render('index',array(
			'models'=>$models,
		));
	}
	public function actionAjaxAddVacancy(){

		$model=new Vacansy;
		$response=array('error'=>true,'success'=>false);
		if (isset($_POST['Vacansy']))
		{
			$model->attributes=$_POST['Vacansy'];
			if ($model->validate()){
				$response['success']=true;
				$response['error']=false;
				$model->save();
			}
		}
		print(CJSON::encode($response));
		Yii::app()->end();
	}
}

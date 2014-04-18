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
				'actions'=>array('index','view','AddVacancy'),
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
	public function actionAddVacancy(){

		$model=new Vacansy;
		if (isset($_POST['Vacansy']))
		{
			$model->attributes=$_POST['Vacansy'];
			$model->file=CUploadedFile::getInstance($model,'file');

			if ($model->validate()){
				$filename = time().md5($model->file->name).'.'.pathinfo($model->file->name, PATHINFO_EXTENSION);
				$model->file = $filename;
				$model->save();
				$model->file->saveAs('media/upload/'.$filename);
				$this->redirect('/page/thanks/');
			}

			$models=Job::model()->findAll('status=1');

			$this->render('index',array(
				'models'=>$models,
				'errors'=>$model->errors,
			));
		}
	}
}

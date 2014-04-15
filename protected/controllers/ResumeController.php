<?php

class ResumeController extends FrontController
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
				'actions'=>array('index','view','CreateResume'),
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
			'model'=>$this->loadModel('Resume', $id),
		));
	}
	
	public function actionCreateResume()
	{
		if (isset($_POST['Resume']))
		{
			$model=new Resume;
			$model->attributes=$_POST['Resume'];
			if ($model->validate())
			{
				$model->save();
				$this->redirect(array('/page/thanks'));
			} else {
				$this->redirect(array('/page/resume'));
			}

		}
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Resume');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}

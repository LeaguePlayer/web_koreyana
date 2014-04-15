<?php

class CallsController extends FrontController
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
				'actions'=>array('index','view','AjaxCreate'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionAjaxCreate()
	{
		if (!empty($_POST['Calls']))
		{
			$model=new Calls;
			$model->attributes=$_POST['Calls'];
			$model->type=$_POST['Calls']['type']=='true' ? true : false;
			if ($model->validate())
			{
				$response['succes']=true;
				$model->save();
			} else {

				$response['error']=$model->errors;

			}
		}
		echo CJSON::encode($response);
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel('Calls', $id),
		));
	}
	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Calls');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}

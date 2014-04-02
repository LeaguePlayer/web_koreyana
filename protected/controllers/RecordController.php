<?php

class RecordController extends FrontController
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
				'actions'=>array('index','view','AjaxAddRecord'),
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
			'model'=>$this->loadModel('Record', $id),
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Record');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	//======AJAX========
	public function actionAjaxAddRecord()
	{
		$response=array('success'=>false);

		$model=new Record;
		if (isset($_POST['Record']))
		{
			$model->attributes=$_POST['Record'];

			if ($model->save())
			{
				$response['success']=true;								
			} else {

				$response['success']=false;
				$response['error']=$model->errors;
			}

		}
		print(CJSON::encode($response));
	}
	//======AJAX========
}

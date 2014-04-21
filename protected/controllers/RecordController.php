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
				'actions'=>array('index','view','AjaxAddRecord', 'qaptcha'),
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

		if(isset(Yii::app()->session['qaptcha_key']) && !empty(Yii::app()->session['qaptcha_key']))
		{
		  $myVar = Yii::app()->session['qaptcha_key'];
		  if(isset($_POST[''.$myVar.'']) && empty($_POST[''.$myVar.'']))
		  {
		  	//it's human no robot
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
		  }
		  else
		  {
		  	//it's robot no human
		    $response['success']=false;	
		  }
		}
		unset(Yii::app()->session['qaptcha_key']);


		
		print(CJSON::encode($response));
	}

	public function actionQaptcha()
	{
		$aResponse['error'] = false;
			
		if(isset($_POST['action']) && isset($_POST['qaptcha_key']))
		{
			Yii::app()->session['qaptcha_key'] = false;	
			
			if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'qaptcha')
			{
				Yii::app()->session['qaptcha_key'] = $_POST['qaptcha_key'];
				echo json_encode($aResponse);
			}
			else
			{
				$aResponse['error'] = true;
				echo json_encode($aResponse);
			}
		}
		else
		{
			$aResponse['error'] = true;
			echo json_encode($aResponse);
		}
	}
	//======AJAX========
}

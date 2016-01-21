<?php

class CallsController extends CController
{
	public $layout='//layouts/simple';

	public function actionCalculateCost(){
		$response['success']=false;

		if ($_POST['CalculateCost']){
			$model=new CalculateCost;
			$model->attributes=$_POST['CalculateCost'];

			if ($response['success']=$model->validate())
			{
				$to=(string)Config::model()->find('param=\'admin.mail\'')->value;

				$subject="Новая заявка с сайта ".Yii::app()->request->hostInfo.'<br>';

				$message='Марка - '.CalculateCost::getBrands($model->id_brand).'<br>';
				$message='Модель - '.$model->model.'<br>';
				$message='Год выпуска - '.$model->year.'<br>';
				$message='Кузов - '.CalculateCost::getBasketType($model->id_basket).'<br>';
				$message='Тип стекла - '.CalculateCost::getGlassTypes($model->id_glass).'<br>';
				$message='Комментарий - '.$model->comment ? $model->comment : 'нет'.'<br>';

				SiteHelper::sendMail($subject,$comment,$to);
			}
		}
		echo CJSON::encode($response);
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
				$response['success'] = true;
				$response['message'] = 'Ваша заявка успешно отправлена!';
				$model->save();
			} else {
				$response['errors']=$model->errors;
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

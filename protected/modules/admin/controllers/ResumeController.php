<?php

class ResumeController extends AdminController
{
	public function ActionUpdate($id)
	{
		$model=Resume::model()->findByPk($id);
		if (isset($_POST['Resume']))
		{
			$model->wswg_body=$_POST['Resume']['wswg_body'];
			$model->status=$_POST['Resume']['status'];
			$model->save();
			$this->redirect(array('list'));
		}
		$educations=Education::model()->findAll('id_resume=:id',array(':id'=>$id));
		$works=Works::model()->findAll('id_resume=:id',array(':id'=>$id));
		$this->render('update',array('model'=>$model, 'educations'=>$educations,'works'=>$works));
	}
	public function actionDownload($id)
	{

		$model=Resume::model()->findByPk($id);
		try
		{
			if (file_exists($model->getUploadFile()))
			{
		        header("Content-Type: application/force-download");
		        header("Content-Type: application/octet-stream");
		        header("Content-Type: application/download");
		        header("Content-Disposition: attachment; filename=" . $model->file);
		        header("Content-Transfer-Encoding: binary ");  
		        readfile($model->getUploadFile());

			} else {

				Yii::app()->User->setFlash('DOWNLOADFAILUR','Файл не найден на сервере');
			}
		}
		catch (Exeption $e){

			die('123');
			$this->render('view',array('model'=>$model));	

		}

		// if (file_exists($model->getUploadFile()))
		// {
	 //        header("Content-Type: application/force-download");
	 //        header("Content-Type: application/octet-stream");
	 //        header("Content-Type: application/download");
	 //        header("Content-Disposition: attachment; filename=" . $model->file);
	 //        header("Content-Transfer-Encoding: binary ");  
	 //        readfile($model->getUploadFile());

		// } else {

		// 	Yii::app()->User->setFlash('DOWNLOADFAILUR','Файл не найден на сервере');
		// }

		
	}
	public function actionDelete($id)
	{
		Resume::model()->deleteByPk($id,'id=:id',array(':id'=>$id));
		Education::deleteAll('id_resume=:id',array(':id'=>$id));
		Works::deleteAll('id_resume=:id',array(':id'=>$id));
	}
}

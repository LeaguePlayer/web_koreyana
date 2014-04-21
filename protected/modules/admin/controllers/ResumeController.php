<?php

class ResumeController extends AdminController
{
	public function ActionUpdate($id)
	{
		$model=Resume::model()->findByPk($id);
		if (isset($_POST['Resume']))
		{
			$model->wswg_body=$_POST['Resume']['wswg_body'];
			$model->save();
			$this->redirect(array('list'));
		}
		$educations=Education::model()->findAll('id_resume=:id',array(':id'=>$id));
		$works=Works::model()->findAll('id_resume=:id',array(':id'=>$id));
		$this->render('update',array('model'=>$model, 'educations'=>$educations,'works'=>$works));
	}
	
	public function actionDelete($id)
	{
		Resume::model()->deleteByPk($id,'id=:id',array(':id'=>$id));
		Education::deleteAll('id_resume=:id',array(':id'=>$id));
		Works::deleteAll('id_resume=:id',array(':id'=>$id));
	}
}

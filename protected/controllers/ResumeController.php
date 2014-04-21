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
			$model->file=CUploadedFile::getInstance($model,'file');
			$model->attributes=$_POST['Resume'];
			if ($model->validate())
			{
				if (isset($_FILES['Resume']['name']))
				{
					if (! file_exists('media/upload'))
						mkdir('media/upload');

					$filename = uniqid(time()).'.'.pathinfo($model->file->name, PATHINFO_EXTENSION);
					
					$model->file->saveAs('media/upload/'.$filename);
					$model->file = $filename;
				}
				$model->status=1;
				$model->save();
				if (isset($_POST['DopEducation']))
				{
					foreach ($_POST['DopEducation'] as $key => $value) {

						$education=new Education;
						$education->attributes=$value;
						$education->id_resume=$model->id;
						if ($education->validate())
							$education->save();
					}
				}
				if (isset($_POST['DopWork']))
				{
					foreach ($_POST['DopWork'] as $key => $value) {

						$works=new Works;
						$works->attributes=$value;
						$works->id_resume=$model->id;
						if ($works->validate())
							$works->save();
					}
				}
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

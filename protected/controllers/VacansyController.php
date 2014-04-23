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
		$models=Job::model()->findAll();

		$node=Structure::model()->findByUrl("vacansies");
		if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name . ' | ' . Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

		$this->render('index',array(
			'models'=>$models,
		));
	}
	
	public function actionAddVacancy(){

		$model=new Resume;
		if (isset($_POST['Vacansy']))
		{
			$model->attributes=$_POST['Vacansy'];
			$model->file=CUploadedFile::getInstance($model,'file');

			if ($model->validate()){
				if (! file_exists('media/upload'))
					mkdir('media/upload');
				$filename = time().md5($model->file->name).'.'.pathinfo($model->file->name, PATHINFO_EXTENSION);
				$model->file->saveAs('media/upload/'.$filename);
				$model->file = $filename;
				$model->status=1;
				$model->save();
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

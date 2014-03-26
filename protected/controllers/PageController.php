<?php

class PageController extends FrontController
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionView($url)
	{
		$node=Structure::model()->findByUrl($url);
		if ( !$node )
			throw new CHttpException(404);


		$page=$node->getComponent();
		$url=$this->getAssetsUrl().DIRECTORY_SEPARATOR;

		$page->wswg_body=str_replace('<img alt="" src="', '<img alt="" src="'.$url, $page->wswg_body);

		$page->wswg_body=str_replace('<img src="', '<img src="'.$url, $page->wswg_body);

		$this->render('view',array(
			'model'=>$page,
		));

	}

	
	public function actionIndex()
	{
		$model=Page::model()->findByPk(1);
		$url=$this->getAssetsUrl().'\\';

		$model->wswg_body=str_replace('<img src="', '<img src="'.$url, $model->wswg_body);
		$this->render('index',array(
			'model'=>$model,
		));
	}
}

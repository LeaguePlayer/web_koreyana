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
		$mark=array('{resume}','{record}');

		foreach ($mark as $key => $value) {
			if (substr_count($page->wswg_body, $value)>0)
			{
				$view=preg_replace('/[{}]/', '', $value);
				$form=$this->renderPartial($view,true,true);
				$page->wswg_body=str_replace($value, $form, $page->wswg_body);
				break;
			}
		}

		$this->render('view',array(
			'model'=>$page,
		));
	}

	public function actionIndex()
	{
		// $all=Page::model()->findAll();
		// foreach ($all as $key => $value) {
		// 	$all[$key]->wswg_body=str_replace('/media//', 'src="/', $all[$key]->wswg_body);
		// 	$all[$key]->save();
		// }
		$model=Page::model()->findByPk(1);
		$this->render('index',array(
			'model'=>$model,
		));
	}
}

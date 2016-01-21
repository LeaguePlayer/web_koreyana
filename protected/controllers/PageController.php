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
		$cs = Yii::app()->clientScript;
		$node=Structure::model()->findByUrl($url);
		if ( !$node )
			throw new CHttpException(404);

		$page=$node->getComponent();

        if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name . ' | ' . Yii::app()->config->get('app.name');

		$mark=array('{resume}','{record}','{contacts}','{calculate_cost}');

		foreach ($mark as $key => $value) {
			if (substr_count($page->wswg_body, $value)>0)
			{
				$view=preg_replace('/[{}]/', '', $value);
				$form=$this->renderPartial($view,null,true);
				$page->wswg_body=str_replace($value, $form, $page->wswg_body);
				break;
			}
		}
		
		if ($url=="Contacts")
		{
			$cs->registerScriptFile('http://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PC5YaAxHJF303X_pR-LSyeodnO-oicuY&id=mymap', CClientScript::POS_END);
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
		$node=Structure::model()->findByUrl("main");
		if ( !empty($node->seo->meta_title) )
            $this->title = $node->seo->meta_title;
        else
            $this->title = $node->name . ' | ' . Yii::app()->config->get('app.name');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($node->seo->meta_keys, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

		$model=Page::model()->findByPk(1);
		$this->render('index',array(
			'model'=>$model,
		));
	}
}

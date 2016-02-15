<?php

class CatalogController extends FrontController
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
	public function actionStatic($alias)
	{
		$this->render($alias);
	}
	public function actionView($alias)
	{

		$Catalog=Catalog::model()->find('alias=:id',array(':id'=>$alias));
		$site_name=Settings::model()->find('name=:id',array(':id'=>'site_name'));

		if (empty($Catalog))
		{
			$parent=MenuSlider::model()->find('alias=:id',array(':id'=>$alias));
			$Catalogs=Catalog::model()->findAll('parent_id=:id order by sort',array(':id'=>$parent->id));
			$Catalog=$Catalogs[0];
		} else 
		{
			$parent=MenuSlider::model()->find('alias=:id',array(':id'=>$alias));
			$Catalogs=Catalog::model()->findAll('parent_id=:id',array(':id'=>$Catalog->parent_id));
		}

		if ( !empty($Catalog->meta_title) )
            $this->title = $Catalog->meta_title;
        else
            $this->title = $Catalog->name.' | '. $site_name->string->value;
        
        Yii::app()->clientScript->registerMetaTag($Catalog->meta_desc, 'description', null, array('id'=>'meta_description'), 'meta_description');
        Yii::app()->clientScript->registerMetaTag($Catalog->meta_keywords, 'keywords', null, array('id'=>'keywords'), 'meta_keywords');

		$this->render('view',array('Catalog'=>$Catalog,'Catalogs'=>$Catalogs,'attrs'=>$Catalog->attrs,'parent'=>$parent));
		
	}
	public function actionIndex()
	{
		
	}
}

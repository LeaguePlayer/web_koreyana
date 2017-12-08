<?php
/* @var $this RequestsBotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Requests Bots',
);

$this->menu=array(
	array('label'=>'Create RequestsBot', 'url'=>array('create')),
	array('label'=>'Manage RequestsBot', 'url'=>array('admin')),
);
?>

<h1>Requests Bots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

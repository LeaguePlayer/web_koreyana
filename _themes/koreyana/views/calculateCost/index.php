<?php
/* @var $this CalculateCostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculate Costs',
);

$this->menu=array(
	array('label'=>'Create CalculateCost', 'url'=>array('create')),
	array('label'=>'Manage CalculateCost', 'url'=>array('admin')),
);
?>

<h1>Calculate Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

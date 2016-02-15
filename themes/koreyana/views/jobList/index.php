<?php
/* @var $this JobListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Job Lists',
);

$this->menu=array(
	array('label'=>'Create JobList', 'url'=>array('create')),
	array('label'=>'Manage JobList', 'url'=>array('admin')),
);
?>

<h1>Job Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

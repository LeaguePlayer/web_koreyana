<?php
$this->breadcrumbs=array(
	'Calculate Costs'=>array('index'),
	$model->id,
);

<h1>View CalculateCost #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_brand',
		'model',
		'year',
		'id_basket',
		'id_glass',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

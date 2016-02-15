<?php
$this->breadcrumbs=array(
	'Calls'=>array('index'),
	$model->id,
);

<h1>View Calls #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fam',
		'sername',
		'comment',
		'type',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

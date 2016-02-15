<?php
$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->name,
);

<h1>View job #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'preview',
		'wswg_body',
		'list_id',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

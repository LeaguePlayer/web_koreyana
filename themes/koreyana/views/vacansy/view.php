<?php
$this->breadcrumbs=array(
	'Vacansies'=>array('index'),
	$model->name,
);

<h1>View Vacansy #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'sername',
		'phone',
		'vacansy',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Records'=>array('index'),
	$model->name,
);

<h1>View Record #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phone',
		'dt_visit',
		'visit_time',
		'avto_info',
		'work_type',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

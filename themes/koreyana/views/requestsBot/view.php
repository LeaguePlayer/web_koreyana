<?php
$this->breadcrumbs=array(
	'Requests Bots'=>array('index'),
	$model->id,
);

<h1>View RequestsBot #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_client',
		'id_type',
		'comment',
		'status',
		'create_time',
	),
)); ?>

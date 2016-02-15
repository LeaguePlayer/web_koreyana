<?php
$this->breadcrumbs=array(
	'Job Lists'=>array('index'),
	$model->name,
);

<h1>View JobList #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'preview',
		'wswg_body',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

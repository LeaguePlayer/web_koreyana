<?php
$this->breadcrumbs=array(
	'Resumes'=>array('index'),
	$model->name,
);

<h1>View Resume #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'job_type',
		'salary',
		'dt_birthday',
		'register_adres',
		'adres_fact',
		'contacts',
		'family_status',
		'height',
		'size',
		'institution',
		'faculty',
		'speciality',
		'study_form',
		'knowledge',
		'wrok_duration',
		'company_name',
		'company_sphere',
		'post',
		'timetable',
		'work_duties',
		'motivate',
		'yours_timetable',
		'postAfterYear',
		'recommendation',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>

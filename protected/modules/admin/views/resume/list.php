<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'resume-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('resume')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>array(
		'name',
		'job_type',
		'salary',
		array(
			'name'=>'dt_birthday',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->dt_birthday)'
		),
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
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Resume::getStatusAliases($data->status)',
			'filter'=>Resume::getStatusAliases()
		),
		'sort',
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		),
		array(
			'name'=>'update_time',
			'type'=>'raw',
			'value'=>'$data->update_time ? SiteHelper::russianDate($data->update_time).\' в \'.date(\'H:i\', strtotime($data->update_time)) : ""'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php if($model->hasAttribute('sort')) Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("resume");', CClientScript::POS_END) ;?>
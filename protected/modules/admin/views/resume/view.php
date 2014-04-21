<?php
	$this->menu = array(
		array('label'=>'Все заявки', 'url'=>array('list'))
	);

?>

<h3>Просмотр резюме "<?= $model->name ?>"</h3>
<?

	if (Yii::app()->user->hasFlash('DOWNLOADFAILUR'))
	{
		echo TbHtml::alert(Yii::app()->user->getFlash('DOWNLOADFAILUR', null,true),array('color'=>TbHtml::ALERT_COLOR_DANGER));
	}
?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'name',
		'phone',
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
        array(
        	'label'=>'Места работы',
			'type'=>'raw',
			'value'=>$this->renderPartial('_works',array('model'=>$model),true,true)
			),
        array(
        	'label'=>'Дополнительное образование',
			'type'=>'raw',
			'value'=>$this->renderPartial('_education',array('model'=>$model),true,true)
			),
		array(
			'label'=>'Файл резюме',
			'type'=>'raw',
			'value'=>CHtml::link('скачать',array('/admin/resume/download', 'id' => $model->id),array('target'=>'_blank')),
			),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>$model->create_time ? SiteHelper::russianDate($model->create_time).' в '.date('H:i', strtotime($model->create_time)) : "",
		),
		'comment'
	)
)) ?>
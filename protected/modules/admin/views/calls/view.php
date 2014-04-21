<?php
	$this->menu = array(
		array('label'=>'Все заявки', 'url'=>array('list'))
	);
?>

<h3>Просмотр заявки от посетителя "<?= $model->fam ?>"</h3>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'fam',
		'sername',
		'phone',
		'e_mail',
		'currentType',
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>$model->create_time ? SiteHelper::russianDate($model->create_time).' в '.date('H:i', strtotime($model->create_time)) : "",
		),
		'comment'
	)
)) ?>
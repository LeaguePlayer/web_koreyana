<!-- <h1>Управление <?php echo $model->translition(); ?></h1> -->

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
		'adres_fact',
		'contacts',
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'$data->getCurrentStatus()',
			'filter'=>Resume::getStatusAliases()
		),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		),
		array(
			'template'=>'{update}{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php if($model->hasAttribute('sort')) Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("resume");', CClientScript::POS_END) ;?>
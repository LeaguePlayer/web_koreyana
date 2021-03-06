<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'record-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('record')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>array(
		
		'name',
		'phone',
		
		array(
			'name'=>'dt_visit',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->dt_visit)'
		),
		'visit_time',
		'avto_info',
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

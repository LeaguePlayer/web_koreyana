<h3>Заявки на звонки</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'calls-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('calls')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>array(
		'fam',
		'sername',
		'phone',
		'e_mail',
		'currentType',
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
		),
	),
)); ?>
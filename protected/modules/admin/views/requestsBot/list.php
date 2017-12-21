<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Запросы <?php echo RequestsBot::getTypes($id_type); ?></h1>
<input id="id_type" value="<? echo $id_type; ?>" type="hidden" />

<div style="margin: 30px 0;">
<?
	foreach( RequestsBot::getTypes() as $got_id_type => $name_type ){
		if($id_type == $got_id_type)
		{
			$color = false;
			$disabled = true;
		}
		else
		{
			$color = TbHtml::BUTTON_COLOR_PRIMARY;
			$disabled = false;
		}


		echo "<div class='switcher sw_type_{$got_id_type}'>";
			echo "<div class='badge'></div>";
			echo TbHtml::linkButton($name_type, array('url'=>array('/admin/requestsBot/list','id_type'=>$got_id_type), 'color' => $color, 'disabled'=>$disabled)); 
		echo "</div>";
	}
?>
</div>

<?
	
	$columns = array();
	$columns[] = array(
			'name'=>'id_client',
			'type'=>'raw',
			'value'=>function($e){
				
				$name = ($e->client->name) ? "{$e->client->name} / {$e->client->phone}" : $e->client->phone;
				return CHtml::link($name, "viber://chat?number={$e->client->phone}", array('target'=>"_blank"));
			},
		);

	if(in_array($id_type, array( RequestsBot::TYPE_STO )))
		$columns[] = array(
			'name'=>'id_office',
			'type'=>'raw',
			'value'=>'RequestsBot::getOffices($data->id_office)',
			'filter'=>false
		);

	$columns[] = 'comment';
	$columns[] = array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		);



?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requests-bot-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('requestsbot')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>$columns,
)); ?>

<?php if($model->hasAttribute('sort')) Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("requestsbot");', CClientScript::POS_END) ;?>
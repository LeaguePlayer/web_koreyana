<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'object-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
    <div class="form-actions">
        <?php echo $form->errorSummary($model); ?>

        <?php if ( Yii::app()->user->hasFlash('SAVED') ) {
            echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash('SAVED'));
        } ?>

<!--         <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/structure/list')); ?> -->
    </div>
<?php $this->endWidget(); ?>




<?php echo TbHtml::linkButton('Добавить вакансию', array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/job/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'job-grid',
    'dataProvider'=>$jobFinder->search(),
    'filter'=>$jobFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('job')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        'name',
        'preview',
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'job::getStatusAliases($data->status)',
            'filter'=>job::getStatusAliases()
        ),
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/job/delete", "id"=>$data->id)'
                ),
                'update'=>array(
                    'url'=>'array("/admin/job/update", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("job");', CClientScript::POS_END) ;?>
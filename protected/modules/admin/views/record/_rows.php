	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'dt_visit'); ?>
		<?php $this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
			'model' => $model,
			'attribute' => 'dt_visit',
			'pluginOptions' => array(
				'format' => 'dd-MM-yyyy',
				'language' => 'ru',
                'pickSeconds' => false,
                'pickTime' => false
			)
		)); ?>
		<?php echo $form->error($model, 'dt_visit'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'visit_time',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'avto_info',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'work_type',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Record::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

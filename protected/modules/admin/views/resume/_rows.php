	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'job_type',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>
	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'salary',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'dt_birthday'); ?>
		<?php $this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
			'model' => $model,
			'attribute' => 'dt_birthday',
			'pluginOptions' => array(
				'format' => 'dd-MM-yyyy',
				'language' => 'ru',
                'pickSeconds' => false,
                'pickTime' => false,
			),
		)); ?>
		<?php echo $form->error($model, 'dt_birthday'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'register_adres',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'adres_fact',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'contacts',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'family_status',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'height',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'size',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'institution',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'faculty',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'speciality',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'study_form',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>
	
	<?
		if (!empty($educations))
		{
			?><h3>Дополнительное образование</h3><?

			foreach ($educations as $key => $value) {
				if ($key=="status")
					break;
				echo $form->textFieldControlGroup($value,$key,array('class'=>'span8','maxlength'=>255,'disabled'=>true));
			}

		}
	?>



	<?php echo $form->textFieldControlGroup($model,'knowledge',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'wrok_duration',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'company_name',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'company_sphere',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'post',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'timetable',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'work_duties',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>
	
	<?
		if (!empty($works))
		{
			?><h3>Места работы </h3><?

			foreach ($works as $key => $value) {
				if ($key=="status")
					break;
				echo $form->textFieldControlGroup($value,$key,array('class'=>'span8','maxlength'=>255,'disabled'=>true));
			}

		}
	?>

	<?php echo $form->textFieldControlGroup($model,'motivate',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'yours_timetable',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'postAfterYear',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'recommendation',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Resume::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	
	<?php echo CHtml::ajaxLink('Файл резюме',$this->createUrl('/admin/resume/download/id/'.$model->id),array());?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_body'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_body', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_body'); ?>
	</div>




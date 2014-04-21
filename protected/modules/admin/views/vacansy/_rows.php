	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'sername',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->textFieldControlGroup($model,'vacansy',array('class'=>'span8','maxlength'=>255,'disabled'=>true)); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Vacansy::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

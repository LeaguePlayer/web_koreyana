	<?php echo $form->textFieldControlGroup($model,'id_brand',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'model',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'year',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'id_basket',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'id_glass',array('class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', CalculateCost::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

	<?php echo $form->textFieldControlGroup($model,'id_client',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'id_type',array('class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'comment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', RequestsBot::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

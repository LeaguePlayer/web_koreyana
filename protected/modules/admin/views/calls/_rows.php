	<?php echo $form->textFieldControlGroup($model,'fam',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'sername',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'comment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'type',array('class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Calls::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

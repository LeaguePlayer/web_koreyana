<div>
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'calls-form',
			'action'=>$this->createUrl('calls/AjaxCreate'),
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				'afterValidate' => "js: function(form, data, hasError) {
					if ( hasError ) return;
					form = $(form);
					$.ajax({
						url: form.attr('action'),
						type: 'POST',
						data: form.serialize(),
						dataType: 'json',
						success: function(data) {
							if ( data.success ) {
								alert(data.message);
								$.fancybox.close();
							}
						}
					});
				}"
			),
            'focus'=>array($model,'fam'),
            //'htmlOptions'=>array('id'=>'login'),

        )); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'fam'); ?>
            <?php echo $form->textField($model,'fam'); ?>
            <?php echo $form->error($model,'fam'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'sername'); ?>
            <?php echo $form->textField($model,'sername'); ?>
            <?php echo $form->error($model,'sername'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'phone'); ?>
            <?php echo $form->textField($model,'phone'); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'e_mail'); ?>
            <?php echo $form->textField($model,'e_mail'); ?>
            <?php echo $form->error($model,'e_mail'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'comment'); ?>
            <?php echo $form->TextArea($model,'comment'); ?>
            <?php echo $form->error($model,'comment'); ?>
        </div>
        <div class="row">
			<?= $form->labelEx($model,'type'); ?><br>
			<?=$form->radioButtonList($model,'type',Calls::getTypes())?>
			<?= $form->error($model,'comment'); ?>
        </div>

        <div class="row">
            <?=CHtml::submitButton('Заказать звонок',array('id'=>'submit'))?>
        </div>

    <?php $this->endWidget(); ?>
</div>
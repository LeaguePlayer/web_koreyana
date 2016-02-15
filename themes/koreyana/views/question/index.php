<div style="display:none;">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'question',
            'action'=>$this->createUrl('question/createQuestion'),
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
                                //alert(data.message);
                                $.fancybox.close();
                                document.location='/page/thanks';
                            }
                        }
                    });
                }"
            ),
            'focus'=>array($model,'name'),
//            'htmlOptions'=>array('id'=>'login'),
        )); ?>
        <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php echo $form->textField($model,'name',array('placeholder'=>'Введите Ваше имя')); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'phone'); ?>
            <?php echo $form->textField($model,'phone',array('placeholder'=>'Введите Ваш номер телефона')); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'comment'); ?>
            <?php echo $form->TextArea($model,'comment',array('placeholder'=>'Какие запчасти вас интересуют?')); ?>
            <?php echo $form->error($model,'comment'); ?>
            <input type="hidden" value="1" name="Question[status]">
        </div>

        <div class="row">
            <?=CHtml::submitButton('Отправить',array('id'=>'submit'))?>
        </div>

    <?php $this->endWidget(); ?>
</div>
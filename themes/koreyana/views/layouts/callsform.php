<div>
    <?php 
        $model=new Calls; 

        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'calls-form',
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>true,
            'focus'=>array($model,'fam'),
            'htmlOptions'=>array('id'=>'login'),

        )); ?>

        <?php echo $form->errorSummary($model); ?>

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
        
        <?php echo CHtml::label('какой какой то вопрос','comment'); ?>
        <div class="row">
            <?=$form->radioButtonList($model,'type',array('true'=>'Запчисти','false'=>'Сервис'))?>
        </div>

        <div class="row">
            <?=CHtml::submitButton('Заказать звонок',array('id'=>'submit'))?>
        </div>
        
    <?php $this->endWidget(); ?>
</div>
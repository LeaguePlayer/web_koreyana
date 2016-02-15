<?php 
    $cs = Yii::app()->clientScript;
    $cs->registerCssFile($this->getAssetsUrl().'/css/QapTcha.jquery.css');
	if ( !$model ) $model = new Record();
?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'form-services',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnTipe' => true,
		'validateOnSubmit' => true,
	),
	'htmlOptions'=>array('style'=>'margin-right:300px')
)) ?>
<ul class="line">
    <li>
        <?= $form->labelEx($model, 'name') ?>
		<?= $form->textField($model, 'name', array('placeholder' => 'Ваше имя')) ?>
		<?= $form->error($model, 'name') ?>
    </li>

	<li>
		<?= $form->labelEx($model, 'phone') ?>
		<?= $form->textField($model, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
		<?= $form->error($model, 'phone') ?>
	</li>

	<li>
		<?= $form->labelEx($model, 'dt_visit') ?>
		<?= $form->textField($model, 'dt_visit', array('placeholder' => '__/__/____', 'class'=>'date')) ?>
		<?= $form->error($model, 'dt_visit') ?>
	</li>

	<li>
		<?= $form->labelEx($model, 'visit_time') ?>
		<?= $form->textField($model, 'visit_time', array('placeholder' => '__:__', 'class'=>'time')) ?>
		<?= $form->error($model, 'visit_time') ?>
	</li>

	<li>
		<?= $form->labelEx($model, 'avto_info') ?>
		<?= $form->textField($model, 'avto_info', array('placeholder' => 'Например Kia Rio')) ?>
		<?= $form->error($model, 'avto_info') ?>
	</li>
	<li>
		<?= $form->labelEx($model, 'work_type') ?>
		<?= $form->textArea($model, 'work_type', array('placeholder' => 'Виды работ...', 'lines'=>11, 'cols'=>55,'style'=>'height:100px;')) ?>
		<?= $form->error($model, 'work_type') ?>
	</li>

    <li>
			<label for="Record_work_type">Защита от спама: перетащите ползунок</label>
            <div class="captcha_wrap">
                <div class="captcha"> 
                    <div class="QapTcha"></div>
                </div>
            </div>    
    </li>
    <li>
        <input style="margin-left:81px;" type="submit" id="formsubmit" value="Записаться">
    </li>
</ul>
<? $this->endWidget() ?>
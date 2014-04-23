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
		'validateOnSubmit' => true
	)
)) ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->labelEx($model, 'name') ?>
        </div>
        <div class="col-lg-8">
			<?= $form->textField($model, 'name', array('placeholder' => 'Ваше имя')) ?>
        </div>
    </div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'phone') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'dt_visit') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'dt_visit', array('placeholder' => '__/__/____', 'class'=>'date')) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'visit_time') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'visit_time', array('placeholder' => '__:__', 'class'=>'time')) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'avto_info') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'avto_info', array('placeholder' => 'Например Kia Rio')) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'work_type') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textArea($model, 'work_type', array('placeholder' => 'Виды работ...', 'rows'=>11, 'cols'=>55)) ?>
		</div>
	</div>

    <div class="row">
            <label>&nbsp;</label>
            <div class="captcha_wrap">
                <div class="captcha"> 
                    <p>Защита от спама: перетащите ползунок</p>

                    <div class="QapTcha"></div>
                </div>
            </div>
            <div class="bt-3"> 
                <a id="formsubmit" href="#">Записаться</a>
            </div>

    </div>

<? $this->endWidget() ?>
<?
    $model=new Calls;
    
?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-services',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnTipe' => true,
        'validateOnSubmit' => true
    )
)); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->labelEx($model, 'fam') ?>
        </div>
        <div class="col-lg-8">
            <?= $form->textField($model, 'fam', array('placeholder' => 'Ваше имя')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->labelEx($model, 'sername') ?>
        </div>
        <div class="col-lg-8">
            <?= $form->textField($model, 'sername', array('placeholder' => 'Ваша фамилия')) ?>
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
            <?= $form->labelEx($model, 'e_mail') ?>
        </div>
        <div class="col-lg-8">
            <?= $form->textField($model, 'e_mail', array('placeholder' => 'example@example.com', 'class'=>'e_mail')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->labelEx($model, 'comment') ?>
        </div>
        <div class="col-lg-8">
            <?= $form->textArea($model, 'comment', array('placeholder' => 'Текст сообщения', 'rows'=>11, 'cols'=>55)) ?>
        </div>
    </div>

    <div class="row">
        <div class="bt-3"> 
            <a id="submitContacts"  href="#">Отправить</a>
        </div>
    </div>

<? $this->endWidget() ?>

<!-- <form id="form-services" action="#">
    <div class="row">
        <div class="col-lg-4">
            <label for="FirstName">Ваша имя</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Calls[fam]" placeholder="Ваше имя" value=""> 
        </div>
    </div>      
    <div class="row">
        <div class="col-lg-4">
            <label for="FirstName">Ваша Фамилия</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Calls[sername]" placeholder="Ваше фамилия" value=""> 
        </div>
    </div>                
    <div class="row">
        <div class="col-lg-4">
            <label for="Tel">Телефон</label>
        </div>
        <div class="col-lg-8">
            <input class="phone_us"  type="text" name="Calls[phone]" placeholder="+7 (___) ___-__-__" value="">
        </div>
    </div>                     
    <div class="row">
        <div class="col-lg-4">
            <label for="mail">E-mail</label> 
        </div>
        <div class="col-lg-8">
            <input type="text" name="Calls[e_mail]" placeholder="example@example.com" value="">
        </div>
    </div>                                   
    <div class="row">
        <div class="col-lg-4">
            <label>Текст обращения</label>
        </div>
        <div class="col-lg-8">
            <textarea rows="11" cols="55" name="Calls[comment]" placeholder="Текст сообщения..."></textarea>
        </div>
    </div>    
    <div class="row">
        <div class="bt-4"> 
            <a id="submitContacts" href="#">Отправить</a>
        </div>
    </div>
</form> -->
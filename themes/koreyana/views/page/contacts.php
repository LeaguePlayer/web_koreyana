<?
    $model=new Calls;
    
?>

<div id="contacts" >
    <div class="bx">
        <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'action' => $this->createUrl('/calls/AjaxCreate'),
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnType' => true,
            'validateOnSubmit' => true,
            'afterValidate' => "js: function(form, data, hasError) {
                if ( hasError ) return;

                form = $('#contact-form');
                var action = form.attr('action');
                $.ajax({
                    url: action,
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function(data) {

                        if ( data.success ) {
                            window.location.href = '".$this->createUrl('/page/thanks')."';
                        }
                        console.log(data);
                    },
                    error:function(){
                         console.log(data);
                    }
                });
            }"
        ),
        'htmlOptions' => array('class' => 'contact_form',)
    )) ?>
            <ul>
                <li>
                    <?= $form->hiddenField($model, 'sendCall', array('value' => false)) ?>
                </li>
                <li>
                    <?= $form->labelEx($model, 'fam') ?>
                    <?= $form->textField($model, 'fam', array('placeholder' => 'Ваше имя')) ?>
                    <?= $form->error($model, 'fam') ?>
                </li>

                <li>
                    <?= $form->labelEx($model, 'sername') ?>
                    <?= $form->textField($model, 'sername', array('placeholder' => 'Ваша фамилия')) ?>
                    <?= $form->error($model, 'sername') ?>
                </li>

                <li>
                    <?= $form->labelEx($model, 'phone') ?>
                    <?= $form->textField($model, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
                    <?= $form->error($model, 'phone') ?>
                </li>

                <li>
                    <?= $form->labelEx($model, 'e_mail') ?>
                    <?= $form->textField($model, 'e_mail', array('placeholder' => 'example@example.com', 'class'=>'e_mail')) ?>
                    <?= $form->error($model, 'e_mail') ?>
                </li>
                
                <li>
                    <?= $form->labelEx($model, 'comment') ?>
                    <?= $form->textArea($model, 'comment', array('placeholder' => 'Текст сообщения', 'lines'=>11, 'cols'=>55)) ?>
                    <?= $form->error($model, 'comment') ?>
                </li>
                <li class="line">
                    <label></label>
                   <input type="submit" value="Отправить">
                </li>
            </ul>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

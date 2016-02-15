
<?
	if ($resumeError)
	{
?>
<script type="text/javascript">
var resumeError=true;
$(function(){
	console.log(resumeError)
	if (resumeError)
	{
		$('#resume-form').show();
		$('body').scrollTop($(document).height()-$(window).height());
	}
})

</script>
<?}?>
<div class="container">
	<div class="center contact-1">
		<h1>Контакты</h1>

		<h2>Часы работы с 9 до 19 часов</h2>
	</div>
</div>

<div id="mymap"><script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=L5qRENfstvx5_oouweuTU_EnkmrdMZle&height=550"></script></div>

<div class="ymaps-overlay-stepwise-pane-1">
	<div id="title-road">
		<span>
			ул. Свердлова, 34<br />г. Ялта, Республика Крым. 
		</span><hr />
	</div>

	<div>
		<p>Телефон: +7 (978) 084 40 73</p>
        <p>Телефон: +7 (978) 084 40 76</p>

		<!--<p>Отдел продаж: доб. 1&nbsp;или прямой (3452) 637-909</p>

		<p>СТО: доб. 2 или прямой (3452) 986-185</p>-->
	</div>
</div>
<div class="container">
	<div class="line form-style cont">
		<p style="text-align: center;"><span style="color: inherit; font-family: inherit; font-size: 31.5px; font-weight: bold; line-height: 40px;">Обратная связь</span></p>
		<div id="contacts" >
		    <div class="bx">
		        <div class="form">
		        <?php $form = $this->beginWidget('CActiveForm', array(
		        'id' => 'contact-form',
		        'action' => $this->createUrl('/calls/AjaxCreate'),
		        'enableClientValidation' => true,
		        'clientOptions' => array(
		            'validateOnType' => false,
		            'validateOnSubmit' => true,
		            'afterValidate'=>'js:function(form, data, hasError){
		            	if (hasError) return;
		            	var result=true;
		            	$.ajax({
		            		url:"/calls/ajaxCreate",
		            		data:form.serialize(),
		            		dataType:"json",
		            		success:function(data){
		            			if (data.error)
		            			{
		            				alert("Ошибка! Ваша заявка не была отправлена. Пожалуйста повторите попытку позднее");
		            				result=false;
		            				return false;
		            			}
		            			
		            		}
		            	})
		        	if (result)
		        		window.location.href="/page/thanks";
		            return result;
		            }'
		        ),
		        'htmlOptions' => array('class' => 'contact_form',)
		    )) ?>
		            <ul>
		                <li>
		                    <?= $form->hiddenField($calls, 'sendCall', array('value' => false)) ?>
		                </li>
		                <li>
		                    <?= $form->labelEx($calls, 'fam') ?>
		                    <?= $form->textField($calls, 'fam', array('placeholder' => 'Ваше имя')) ?>
		                    <?= $form->error($calls, 'fam') ?>
		                </li>

		                <li>
		                    <?= $form->labelEx($calls, 'sername') ?>
		                    <?= $form->textField($calls, 'sername', array('placeholder' => 'Ваша фамилия')) ?>
		                    <?= $form->error($calls, 'sername') ?>
		                </li>

		                <li>
		                    <?= $form->labelEx($calls, 'phone') ?>
		                    <?= $form->textField($calls, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
		                    <?= $form->error($calls, 'phone') ?>
		                </li>

		                <li>
		                    <?= $form->labelEx($calls, 'e_mail') ?>
		                    <?= $form->textField($calls, 'e_mail', array('placeholder' => 'example@example.com', 'class'=>'e_mail')) ?>
		                    <?= $form->error($calls, 'e_mail') ?>
		                </li>
		                
		                <li>
		                    <?= $form->labelEx($calls, 'comment') ?>
		                    <?= $form->textArea($calls, 'comment', array('placeholder' => 'Текст сообщения', 'lines'=>11, 'cols'=>55)) ?>
		                    <?= $form->error($calls, 'comment') ?>
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
	</div>
</div>
<div class="container">
    <div class="center jobs-1">
        <h1 style="margin-bottom:30px;">Вакансии</h1>
        <p><?=(empty($vacansies) ? "На данный момент нет свободных вакансий." : "")?></p>
        <h2 style="margin-top:30px;">Автокомплекс «Кореяна» приглашает на работу</h2>
    </div>
</div>
<?
	foreach ($vacansies as $key => $value) {
		?>
		<div class="gray jobs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h2><?=$value->name?></h2>
                    </div>
                    <div class="col-lg-9">
                        <?=$value->wswg_body?>
                    </div>
                </div>
            </div>
    	</div>
    	<?
    }
?>
<div class="container">
    <div class="row jobs-5">
        <ul class="orange"><li><a href="#" class="showForm">Отправить резюме</a></li><li>или</li><li><a href="/page/resume">Заполнить резюме</a></li></ul>
  
   <div id="resume" class="line">
    <div class="bx">
        <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', 
            array(
                'id' => 'resume-form',
                'action' => $this->createUrl('/page/contacts/'),
                'enableClientValidation' => true,
                // 'enableAjaxValidation'=>false,
                'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                'htmlOptions'=>array('class' => 'contact_form', 'enctype'=>'multipart/form-data', 'style'=>'display:none'),
            )
        ); 
        ?>
            <ul>
                <li>
                    <?= $form->hiddenField($resume, 'contactPage', array('value' => true)) ?>
                </li>
                <li>
                    <?= $form->labelEx($resume, 'name') ?>
                    <?= $form->textField($resume, 'name', array('placeholder' => 'Ваше имя')) ?>
                    <?= $form->error($resume, 'name') ?>
                </li>

                <li>
                    <?= $form->labelEx($resume, 'phone') ?>

                    <?= $form->textField($resume, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
                    <?= $form->error($resume, 'phone') ?>
                </li>
                
                <li>
                    <?= $form->labelEx($resume, 'job_type') ?>
                    <?= $form->textField($resume, 'job_type', array('placeholder' => 'Вакансия', 'lines'=>11, 'cols'=>55)) ?>
                    <?= $form->error($resume, 'job_type') ?>
                    
                </li>
                <li style="overflow:hidden">
                    <label>Прикрепить резюме</label>
                    <div class="attechFile">
                        <?= $form->fileField($resume, 'file') ?>
                        <span >Прикрепить резюме</span> 
                    </div>
                    <div class="clear"></div>
                    <div class="fileName"></div>
                    <?= $form->error($resume, 'file') ?>
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
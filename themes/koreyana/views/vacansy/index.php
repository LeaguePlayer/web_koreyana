<?
    print($contacts->wswg_body);
?>
<?
    $model=new Resume;
    //$model->contactPage=true;
?>
<div class="container">
    <div class="center jobs-1">
        <h1 style="margin-bottom:30px;">Вакансии</h1>
        <p><?=(empty($models) ? "На данный момент нет свободных вакансий." : "")?></p>
        <h2 style="margin-top:30px;">Автокомплекс «Кореяна» приглашает на работу</h2>
    </div>
</div>
<?

	foreach ($models as $key => $value) {
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
        <!-- <form style="display:none" id="vacansy_form" action="/resume/CreateResume/" class="form-job" method="POST" enctype="multipart/form-data" >
            <div class="line">
                <div class="lable">
                    <label for="FirstName">Ваше имя</label>
                </div>
                <input type="text" name="Resume[name]" placeholder="Ваше имя" value="">
                <? if(isset($errors['name'])): ?>
                <div class="errors"><? foreach($errors['name'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="line">
                <div class="lable">
                    <label class="label" for="FirstName">Телефон</label>
                </div>
                <input name="Resume[phone]" type="text" class="Tel" placeholder="+7 (___) ___-__-__" value="">
                <? if(isset($errors['phone'])): ?>
                <div class="errors"><? foreach($errors['phone'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="line">
                <div class="lable">
                    <label class="label" for="FirstName">Вакансия</label>
                </div>
                <input type="text" name="Resume[job_type]" placeholder="Вакансия" value="">
                <? if(isset($errors['resume'])): ?>
                <div class="errors"><? foreach($errors['resume'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="clear"></div>
            <div class="attechFile">
                <input type="file" name="Resume[file]">
                <span >Прикрепить резюме</span> 
            </div>
                <? if(isset($errors['file'])): ?>
                <div class="errors"><?= $errors['file'][0] ; ?></div>
                <? endif; ?>
            <div class="line send">
                <input type="submit" id="sendVacansy" value="Отправить">
            </div>
        </form> 
     

    </div>
</div>-->
   <div id="resume" class="line">
    <div class="bx">
        <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'resume-form',
        'action' => $this->createUrl('/resume/CreateResume/'),
        'enableClientValidation' => true,
        'clientOptions' => array(
                'validateOnType' => true,
                
            ),
        'htmlOptions'=>array('class' => 'contact_form','enctype'=>'multipart/form-data','style'=>'display:none'),
        )); ?>
            <ul>
                <li>
                    <?= $form->hiddenField($model, 'contactPage', array('value' => true)) ?>
                </li>
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
                    <?= $form->labelEx($model, 'job_type') ?>
                    <?= $form->textField($model, 'job_type', array('placeholder' => 'Вакансия', 'lines'=>11, 'cols'=>55)) ?>
                    <?= $form->error($model, 'job_type') ?>
                    
                </li>
                <li>
                    <label>Прикрепить резюме</label>
                    <div class="attechFile">
                        <?= $form->fileField($model, 'file') ?>
                        <span >Прикрепить резюме</span> 
                    </div>
                    <?= $form->error($model, 'file') ?>
                    <div class="fileName"></div>
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
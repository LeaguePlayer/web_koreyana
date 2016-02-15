<?
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile($this->getAssetsUrl().'/js/add-block.js', CClientScript::POS_END);
    $model=new Resume;
?>
<div class="container">
<div class="line form-style">
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-resume',
    'action' => $this->createUrl('page/resume'),
    'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate'=>'js:function(form, data, hasError){
            
            if (hasError)
            {
                $("body").scrollTop(0);
                return false;
            }
                
            return true;
        }',
    )
)) ?>
<ul>
    <li>
            <?= $form->labelEx($model, 'name') ?>
            <?= $form->textField($model, 'name') ?>
            <?= $form->error($model, 'name') ?>
    </li>

    <li>
            <?= $form->labelEx($model, 'job_type') ?>
            <?= $form->textField($model, 'job_type') ?>
            <?= $form->error($model, 'job_type') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'phone') ?>
            <?= $form->textField($model, 'phone', array('placeholder' => '+7 (___) ___-__-__', 'class'=>'phone_us')) ?>
            <?= $form->error($model, 'phone') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'salary') ?>
            <?= $form->textField($model, 'salary') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'dt_birthday') ?>
            <?= $form->textField($model, 'dt_birthday') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'register_adres') ?>
            <?= $form->textField($model, 'register_adres') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'adres_fact') ?>
            <?= $form->textField($model, 'adres_fact') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'contacts') ?>
            <?= $form->textField($model, 'contacts') ?>
    </li>
    <li>
            <?= $form->labelEx($model, 'family_status') ?>
            <?= $form->textField($model, 'family_status') ?>
    </li>
    <li>
            <p>Образование, когда и какие учебные заведения окончили</p>
    </li>  
    <li>
        <div class="blocks" param="0">
            <div class="block_1 margin_bottom">
                <div >                         
                        <label for="institution">Учебное заведение</label>
                        <input type="text" name="Resume[DopEducation][1][Education][institution]" value="">
                </div> 
                <div >
                        <label for="date-and">Дата окончания</label>
                        <input type="text" name="Resume[DopEducation][1][Education][dt_end]" value="">
                </div> 
                <div >
                        <label for="faculty">Факультет</label>
                        <input type="text" name="Resume[DopEducation][1][Education][faculty]" value="">
                </div> 
                <div >
                        <label for="speciality">Специальность</label>
                        <input type="text" name="Resume[DopEducation][1][Education][speciality]" value="">
                </div> 
                <div >
                        <label for="education-form">Форма обучения</label>
                        <input type="text" name="Resume[DopEducation][1][Education][study_form]" value="">
                </div>
                <div class="margin-bottom" style="display:none">
                    <div class="col-lg-8">
                        <a class="btn del" href="#">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li>
        <label></label>
        <div class=" clearfix">
            <a class="btn" href="#" id="add">Указать еще</a>
        </div>
    </li>
    <li>
        <label></label>
        <p>Компьютерные навыки и знания</p>
        <label></label>
        <textarea s="11" name="Resume[knowledge]" cols="55"></textarea>
    </li>
    <li>
           <p>Опыт работы</p>
    </li> 
    <li>
    <li >
        <div class="blocks_2" param="0">
            <div class="block_2">
                <div >
                        <label for="experience">Период работы</label>
                        <input type="text" name="Resume[DopWork][1][Works][wrok_duration]" value="">
                </div> 
                <div >
                        <label for="company-name">Название компании</label>
                        <input type="text" name="Resume[DopWork][1][Works][company_name]" value="">
                </div> 
                <div >
                        <label for="sphere">Сфера деятельности компании</label>
                        <input type="text" name="Resume[DopWork][1][Works][company_sphere]" value="">
                </div> 
                <div >
                        <label for="profession">Должность или профессия</label>
                        <input type="text" name="Resume[DopWork][1][Works][post]" value="">
                </div> 
                <div >
                        <label for="timetable">График работы</label>
                        <input type="text" name="Resume[DopWork][1][Works][timetable]" value="">
                </div> 
                <div>
                        <label>Должностные обязанности и достижения</label>
                        <textarea name="Resume[DopWork][1][Works][work_duties]" s="11" cols="55"></textarea>
                </div>
                <div style="display:none">
                    <div class="col-lg-8">
                        <a class="btn del1" href="#">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li id="margin-bottom" >
        <label></label>
        <a class="btn add1" href="#" id="add1">Указать еще</a>
    </li> 
    <li>
        <label></label>
        <div class="resume-block">
            <label for="motives">Мотивы и стимулы, побудившие Вас прийти именно к нам</label>
            <input type="text" name="Resume[motivate]" value="">
        </div>
    </li> 
    <li>
        <label></label>
        <div class="resume-block">
            <label for="business-travel">Какой график работы Вас устроиит? Ваше отношение 
                    к возможным командировкам?</label>
            <input type="text" name="Resume[yours_timetable]" value="">
        </div>
    </li>
    <li>
        <label></label>
        <div class="resume-block">
            <label for="plans">Как Вы представляете свое положение в нашей 
                    компании через год?</label>
            <input type="text" name="Resume[postAfterYear]" value="">
        </div>
    </li> 
    <li>
        <label></label>
        <div class="resume-block">
            <label for="recommendation">Кто из Ваших бывших коллег и руководителей может дать 
                    Вам устную рекомендацию или рекомендательное письмо?</label>
                <input type="text" name="Resume[recommendation]" value="">
        </div>
    </li>
    <li >
        <label></label>
            <input type="submit" value="Отправить">
    </li>
    </ul>
<?php $this->endWidget() ?>
</div>
</div>
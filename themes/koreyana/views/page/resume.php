<?
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile($this->getAssetsUrl().'/js/add-block.js', CClientScript::POS_END);

	if ( !$model ) $model = new Resume();
?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'form-resume',
	'action' => $this->createUrl('resume/createResume'),
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	)
)) ?>
    <div class="row">
        <div class="col-lg-4">
			<?= $form->labelEx($model, 'name') ?>
        </div>
        <div class="col-lg-8">
            <?= $form->textField($model, 'name') ?>
        </div>
    </div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'job_type') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'job_type') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'salary') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'salary') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'dt_birthday') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'dt_birthday') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'register_adres') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'register_adres') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'adres_fact') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'adres_fact') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'contacts') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'contacts') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'family_status') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'family_status') ?>
		</div>
	</div>

    <div class="row">
        <div class="col-lg-4"></div>
        <div id="param" class="col-lg-8">
            <p>Укажите ваш рост в сантиметрах и размер одежды</p>
            <span>по Российской шкале 46,48,50...</span>
        </div>
    </div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'height') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'height') ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<?= $form->labelEx($model, 'size') ?>
		</div>
		<div class="col-lg-8">
			<?= $form->textField($model, 'size') ?>
		</div>
	</div>

	<div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <p>Образование, когда и какие учебные заведения окончили</p>
        </div>
    </div>  
    <div class="blocks" param="0">
        <div class="block_1 margin_bottom">
            <div class="row">                         
                <div class="col-lg-4">
                    <label for="institution">Учебное заведение</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[institution]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="date-and">Дата окончания</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[date-and]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="faculty">Факультет</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[faculty]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="speciality">Специальность</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[speciality]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="education-form">Форма обучения</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[study_form]" value="">
                </div>
            </div>
            <div class="row margin-bottom" style="display:none">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <a class="btn del" href="#">Удалить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <a class="btn" href="#" id="add">Указать еще</a>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <p>Компьютерные навыки и знания</p>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <textarea rows="11" name="Resume[knowledge]" cols="55"></textarea>
        </div>
    </div>
    <div class="row">                         
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <p>Опыт работы</p>
        </div>
    </div> 
    <div class="blocks_2" param="0">
        <div class="block_2">
            <div class="row">
                <div class="col-lg-4">
                    <label for="experience">Период работы</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[wrok_duration]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="company-name">Название компании</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[company_name]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="sphere">Сфера деятельности компании</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[company_sphere]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="profession">Должность или профессия</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[post]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="timetable">График работы</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[timetable]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label>Должностные обязанности<br> и достижения</label>
                </div>
                <div class="col-lg-8">
                    <textarea name="Resume[work_duties]" rows="11" cols="55"></textarea>
                </div>
            </div> 
            <div class="row ">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
       
                    <a class="btn del1" href="#">Удалить</a>
                </div>
            </div> 
        </div>
    </div>
    <div class="row " id="margin-bottom" >
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <a class="btn add1" href="#" id="add1">Указать еще</a>

        </div>
    </div> 
    <div class="row" >
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <label for="motives">Мотивы и стимулы, побудившие Вас прийти именно к нам</label>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <input type="text" name="Resume[motivate]" value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <label for="business-travel">Какой график работы Вас устроиит? Ваше отношение 
                к возможным командировкам?</label>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <input type="text" name="Resume[business-travel]" value="">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <label for="plans">Как Вы представляете свое положение в нашей 
                компании через год?</label>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <input type="text" name="Resume[postAfterYear]" value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <label for="recommendation">Кто из Ваших бывших коллег и руководителей может дать 
                <br>Вам устную рекомендацию или рекомендательное письмо?</label>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <input type="text" name="Resume[recommendation]" value="">
        </div>
    </div>
    <div class="row">
        <div class="bt-4"> 
            <input type="submit" value="Отправить">
        </div>
    </div>
<?php $this->endWidget() ?>
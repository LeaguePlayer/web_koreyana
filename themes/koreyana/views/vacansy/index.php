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
        <ul class="orange"><li>Отправить резюме</li><li>или</li><li><a href="/page/resume">Заполнить резюме</a></li></ul>
        <form id="vacansy_form" action="/resume/CreateResume/" class="form-job" method="POST" enctype="multipart/form-data" >
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
</div>
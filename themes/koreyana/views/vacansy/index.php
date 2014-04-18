<div class="container">
    <div class="center jobs-1">
        <h1>Вакансии</h1>
        <h2>Автокомплекс «Кореяна» приглашает на работу</h2>
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
        <form id="vacansy_form" action="/vacansy/AddVacancy/" class="form-job" method="POST" enctype="multipart/form-data" >
            <div class="line">
                <div class="lable">
                    <label for="FirstName">Ваше имя</label>
                </div>
                <input type="text" name="Vacansy[name]" placeholder="Ваше имя" value="">
                <? if(isset($errors['name'])): ?>
                <div class="errors"><? foreach($errors['name'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="line">
                <div class="lable">
                    <label for="FirstName">Фамилия</label>
                </div>
                <input type="text" name="Vacansy[sername]" placeholder="Фамилия" value="">
                <? if(isset($errors['sername'])): ?>
                <div class="errors"><? foreach($errors['sername'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="line">
                <div class="lable">
                    <label class="label" for="FirstName">Телефон</label>
                </div>
                <input name="Vacansy[phone]" type="text" class="Tel" placeholder="+7 (___) ___-__-__" value="">
                <? if(isset($errors['phone'])): ?>
                <div class="errors"><? foreach($errors['phone'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="line">
                <div class="lable">
                    <label class="label" for="FirstName">Вакансия</label>
                </div>
                <input type="text" name="Vacansy[vacansy]" placeholder="Вакансия" value="">
                <? if(isset($errors['vacansy'])): ?>
                <div class="errors"><? foreach($errors['vacansy'] as $error): ?><?= $error; ?><? endforeach; ?></div>
                <? endif; ?>
            </div>
            <div class="clear"></div>
            <div class="attechFile">
                <input type="file" name="Vacansy[file]">
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
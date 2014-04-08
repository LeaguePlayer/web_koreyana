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
                <ul class="orange"><li>Отправить резюме</li><li></li><li><a href="#">Заполнить резюме</a></li></ul>
                <form id="vacansy_form" action="#" class="form-job">
                    <div class="line">
                        <div class="lable">
                            <label for="FirstName">Ваше имя</label>
                        </div>
                        <input type="text" name="Vacansy[sername]" placeholder="Ваше имя" value="">
                    </div>
                    <div class="line">
                        <div class="lable">
                            <label for="FirstName">Фамилия</label>
                        </div>
                        <input type="text" name="Vacansy[sername]" placeholder="Фамилия" value="">
                    </div>
                    <div class="line">
                        <div class="lable">
                            <label class="label" for="FirstName">Телефон</label>
                        </div>
                        <input name="Vacansy[phone]" type="text" class="Tel" placeholder="+7 (___) ___-__-__" value="">
                    </div>
                    <div class="line">
                        <div class="lable">
                            <label class="label" for="FirstName">Вакансия</label>
                        </div>
                        <input type="text" name="Vacansy[vacansy]" placeholder="Вакансия" value="">
                    </div>
                    <div class="clear"></div>
                    <div class="attechFile">
                        <span >Прикрепить резюме</span> 
                        <input type="file" style="display:none;">
                    </div>
                    <div class="line send">
                        <input type="submit" name="send" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
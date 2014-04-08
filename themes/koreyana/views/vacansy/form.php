<style>
form{
	
}
</style>
<ul><li>Отправить резюме</li><li>или</li><li><a href="#">Заполнить резюме</a></li></ul>
<form id="vacansy_form" action="#">
    <label for="FirstName">Ваше имя</label>
    <input type="text" name="Vacansy[name]" placeholder="Ваше имя" value=""> 
    <label for="LastName">Фамилия</label>
    <input type="text" name="Vacansy[sername]" placeholder="Фамилия" value="">
    <label for="Tel">Телефон</label> 
    <input name="Vacansy[phone]" type="text" class="Tel" placeholder="+7 (___) ___-__-__" value="">
    <label for="Vacansy">Вакансия</label>
    <input type="text" name="Vacansy[vacansy]" placeholder="Вакансия" value="">
    <span>Прикрепить резюме</span> 
    <input type="file" style="display:none;">
    <a href="#">Отправить</a>
</form>
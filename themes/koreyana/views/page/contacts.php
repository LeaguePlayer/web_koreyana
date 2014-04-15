<?
    $model=new Vacansy;
    
?>

<form id="form-services" action="#">
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
</form>
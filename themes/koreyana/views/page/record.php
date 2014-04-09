<form id="form-services">

    <div class="row">
        <div class="col-lg-4">
            <label for="FirstName">Ваше имя</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Record[name]" placeholder="Ваше имя" value=""> 
        </div>
    </div>                 
    <div class="row">
        <div class="col-lg-4">
            <label for="Tel">Телефон</label>
        </div>
        <div class="col-lg-8">
            <input class="phone_us" type="text" name="Record[phone]" placeholder="+7 (___) ___-__-__" value="">
        </div>
    </div>                     
    <div class="row">
        <div class="col-lg-4">
            <label for="Date">Дата визита</label> 
        </div>
        <div class="col-lg-8">
            <input class="date" type="text" name="Record[dt_visit]" placeholder="__/__/____" value="">
        </div>
    </div>                     
    <div class="row">
        <div class="col-lg-4">
            <label for="Time">Время визита</label>
        </div>
        <div class="col-lg-8">
            <input class="time" type="text" name="Record[visit_time]" placeholder="__:__" value="">
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label for="Car">Марка и модель</br> автомобиля</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Record[avto_info]" placeholder="Например Kia Rio" value="">
        </div>
    </div>                 
    <div class="row">
        <div class="col-lg-4">
            <label>Предположительные</br> виды работ</label>
        </div>
        <div class="col-lg-8">
            <textarea rows="11" cols="55" name="Record[work_type]" placeholder="Виды работ..." ></textarea>
        </div>
    </div>  

    <div class="row">
            <label>&nbsp;</label>
            <div class="captcha_wrap">
                <div class="captcha"> 
                    <p>Защита от спама, правильное расположение (образец)</p>
                    <img src="/media/images/captcha-1.png" alt=""/>
                    <p>Расположите в соответствии с выше представленными</p>
                </div>
                <ul id="sortable">
                    <li class="captchaItem"><img src="/media/images/icon/captcha-a.png" alt="8080"/></li>
                    <li class="captchaItem"><img src="/media/images/icon/captcha-v.png" alt="5432"/></li>
                    <li class="captchaItem"><img src="/media/images/icon/captcha-t.png" alt="1234"/></li>
                    <li class="captchaItem"><img src="/media/images/icon/captcha-o.png" alt="7272"/></li>
                 </ul>
            </div>
            <div class="bt-3"> 
                <a id="formsubmit" href="#">Записаться</a>
            </div>

    </div>

</form>
<form id="form-resume" action="#">
    <div class="row">
        <div class="col-lg-4">
            <label for="fio">ФИО</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[fio]" value=""> 
        </div>
    </div>                 
    <div class="row">
        <div class="col-lg-4">
            <label for="job">На какую должность <br>вы претендуете</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[job]" value="">
        </div>
    </div>                     
    <div class="row">
        <div class="col-lg-4">
            <label for="money">Желаемый доход</label> 
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[money]" value="">
        </div>
    </div>                     
    <div class="row">
        <div class="col-lg-4">
            <label for="date-born">Дата и место <br>рождения</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[date-born]" value="">
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label for="registration">Адрес постоянной<br> регистрации</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[registration]" value="">
        </div>
    </div>  
    <div class="row">
        <div class="col-lg-4">
            <label for="adress">Адрес проживания</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[adress]" value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4">
            <label for="tel-mail">Контактная информация:<br>
                тел., e-mail</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[tel-mail]" value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4">
            <label for="family">Семейное положение,<br> дети</label>
        </div>
        <div class="col-lg-8">
            <input type="text" name="Resume[family]" value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4"></div>
        <div id="param" class="col-lg-8">
            <p>Укажите ваш рост в сантиметрах и размер одежды</p>
            <span>по Российской шкале 46,48,50...</span>
            <div class="row">
                <div class="col-lg-2">
                    <label for="stature">Рост (см)</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[stature]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-2">
                    <label for="size">Размер</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[size]" value="">
                </div>
            </div> 
        </div>
    </div> 

    <div class="row">                         
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <p>Образование, когда и какие учебные заведения окончили</p>
        </div>
    </div>  
    <div class="blocks">
        <div class="block_1 margin_bottom">
            <div class="row">                         
                <div class="col-lg-4">
                    <label for="university">Учебное заведение</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[university]" value="">
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
                    <input type="text" name="Resume[education-form]" value="">
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
            <textarea rows="11" cols="55"></textarea>
        </div>
    </div>
    <div class="row">                         
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <p>Опыт работы</p>
        </div>
    </div> 
    <div class="blocks_2">
        <div class="block_2">
            <div class="row">
                <div class="col-lg-4">
                    <label for="experience">Период работы</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[experience]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="company-name">Название компании</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[company-name]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="sphere">Сфера деятельности компании</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[sphere]" value="">
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-4">
                    <label for="profession">Должность или профессия</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="Resume[profession]" value="">
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
                    <textarea rows="11" cols="55"></textarea>
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
            <input type="text" name="Resume[motives]" value="">
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
            <input type="text" name="Resume[plans]" value="">
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
            <a href="#">Отправить</a>
        </div>
    </div>
</form>
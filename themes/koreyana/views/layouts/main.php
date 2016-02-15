<?php

    $cs = Yii::app()->clientScript;
    //$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/bootstrap.min.css?v=1.1');
    $cs->registerCssFile($this->getAssetsUrl().'/css/template.css?v=1.17');
    $cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css?v=1.1');
    $cs->registerCssFile($this->getAssetsUrl().'/css/jquery-ui.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui.theme.css');
    //$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
    //$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
    //$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-buttons.css');
    
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/carousel.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/bootstrap.min.js?v=1.2', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/script.js?v=1.2', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/colorup.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.mask.js?v=1.1', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js?v=1.1', CClientScript::POS_END);
    // $cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.ui.touch.js?v=1.1', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/QapTcha.jquery.min.js?v=1.1', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/owl.carousel.min.js?v=1.1', CClientScript::POS_END);
        
    //$cs->registerScriptFile('http://api-maps.yandex.ru/1.1/index.xml?key=APzyTFMBAAAAgHpRaQIAaei-e5SRlLvVX3VSxD32FuOHoawAAAAAAAAAAACpuStqol9UmMrIRM4uK3V94DSNQg==', CClientScript::POS_END);
    //$cs->registerScriptFile('http://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PC5YaAxHJF303X_pR-LSyeodnO-oicuY&id=map-1', CClientScript::POS_END);
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
    //$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
    
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);
?><!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $this->title; ?></title>
        <link href="/media/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body <?php $this->is_home() ? print 'class="background"' : print '';?>>
        <header id="header">
            <div id="header-wrapper">
            <div class="container">
                <div class="row navbar-wrapper">
                    <div class="col-lg-2 logotip">
                        <a id="logo" href="/"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/logo-k.png"/></a>
                        <a id="brand" href="/"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/menu-down-buttons.png"/></a>
                    </div>
                    <ul class="statick_menu">
                        <!-- <li>
                            <a href="/page/disposal">Услуги</a>
                        </li> -->
                        <!-- <li>
                            <a href="/page/warranty">Гарантия</a>
                        </li> -->
                        <!-- <li>
                            <a href="/vacansy/index"> Вакансии</a>
                        </li> -->
<!--                         <li>
                            <a href="/page/about">О Нас</a>
                        </li> -->
                        <!-- <li>
                            <a href="/page/Contacts">Контакты</a>
                        </li> -->
                    </ul>
                    <div class="col-lg-8 top-menu">
                        <div class="navbar">

                            <ul class="nav navbar-nav">

                                <?
                                    foreach ($this->menu as $key => $value) {
                                        print('<li class="'.($value['active'] ? 'active': '').'"><a href="'.$value['url'].'" '.(strlen($value['label'])>40 ? 'id="long-bottom"' : (strlen($value['label'])>16 ? 'id="padding-top-6"' : '')).'>'.$value['label'].'</a></li>');
                                    }
                                ?>
                                
                                <!-- <li class="active"><a href="#">Услуги</a></li>
                                <li><a id="padding-top-6" href="#">Запасные</br>детали</a></li>
                                <li><a href="#">Гарантия</a></li>
                                <li><a id="long-bottom" href="#">Корпоративным</br>клиентам</a></li>
                                <li><a href="#">О нас</a></li>
                                <li><a href="#">СТО</a></li>
                                <li><a href="#">Вакансии</a></li>
                                <li><a href="#">Контакты</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 phone">
                        <a id="callBtn" href="#callBox" >Заказать звонок</a>
                        <a class="number" href="tel:+73452500480">+7 (3452) 500-480</a>
                    </div>
                    <div class="col-lg-2 service">
                        <h3>Запись на сервис</h3>
                        <a href="/page/records">Записаться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty">
        </div>
        </header>

        <?php echo $content;?>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-2 netweb">
                        <h5>Следуй за нами:</h5>  
                            <? if(Yii::app()->config->get('social.twitter')):?><a href="<?= Yii::app()->config->get('social.twitter');?>"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/twitter.png" /></a><? endif; ?>
                            <? if(Yii::app()->config->get('social.facebook')):?><a href="<?= Yii::app()->config->get('social.facebook');?>"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/facebook.png" /></a><? endif; ?>
                            <? if(Yii::app()->config->get('social.skype')):?><a href="<?= Yii::app()->config->get('social.skype');?>"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/skype.png" /></a><? endif; ?>
                            <? if(Yii::app()->config->get('social.instagram')):?><a href="<?= Yii::app()->config->get('social.instagram');?>"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/instagram.png" /></a><? endif; ?>
                    </div> -->
                    
                    <div class="col-lg-2 logo">
                        <h6>А-Мобайл и Кореяна Друзья с 2014 года</h6> 
                        <a href="http://amobile-studio.ru/" target="_blank"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/logo.png" style="width:80px;" alt=""/></a>
                    </div>
                </div>
            </div><!--container -->
        </footer>

        <div style="display:none;">
            <div id="callBox">
                <?= $this->renderPartial('//layouts/callsform',array('model'=>new Calls()) )?>
            </div>
        </div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter24945377 = new Ya.Metrika({id:24945377,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/24945377" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

    <script crossorigin="anonymous" async type="text/javascript" src="//api.pozvonim.com/widget/callback/v3/0ad0827f0b3bdae27b34c21411c21a2c/connect" id="check-code-pozvonim" charset="UTF-8"></script>
    </body>
</html>
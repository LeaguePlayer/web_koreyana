<?php

	$cs = Yii::app()->clientScript;
	//$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/bootstrap.min.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/template.css');
	
	//$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	//$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
	//$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-buttons.css');
	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	//$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery-1.10.2.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/carousel.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/bootstrap.min.js', CClientScript::POS_END);
	$cs->registerScriptFile('http://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PC5YaAxHJF303X_pR-LSyeodnO-oicuY&id=map-1', CClientScript::POS_END);
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
                        <a id="logo" href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/logo-k.png"/></a>
                        <a id="brand" href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/menu-down-buttons.png"/></a>
                    </div>
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
                    <div class="col-lg-2 service">
                        <h3>Запись на сервис</h3>
                        <a href="#">Записаться</a>
                    </div>
                </div>
            </div>
        </div>
		</header>

		<div class="container">
		<?php echo $content;?>
		</div>

		<footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 etalon">
                        <h5>ООО ЭТАЛОН-АВТО</h5>
                        <p>2008-2014. Вся текстовая и графическая информаци </br>на сайте защищена знаком об авторском праве. 
                            При использовании любых материалов сайта ссылка обязательна.</p> 
                    </div>
                    <div class="col-lg-2 netweb">
                        <h5>Следуй за нами:</h5>  
                            <a href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/twitter.png" /></a>
                            <a href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/facebook.png" /></a>
                            <a href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/skype.png" /></a>
                            <a href="#"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/instagram.png" /></a>
                    </div>
                    <div class="col-lg-4 phone">
                        <a href="#">Связаться с нами</a>
                        <img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/phone.png" />
                        <span>30 57 93</span>
                    </div>
                    <div class="col-lg-2 logo">
                        <h6>С Кореяна друзья с 2013 года</h6> 
                        <a href="http://amobile-studio.ru/" target="_blank"><img src="<?=$this->getAssetsUrl().DIRECTORY_SEPARATOR?>images/icon/logo.png" alt=""/></a>
                    </div>
                </div>
            </div><!--container -->
        </footer>
	</body>
</html>
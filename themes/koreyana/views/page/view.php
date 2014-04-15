<?php
$cs = Yii::app()->clientScript;
$pathToAssets=$this->getAssetsUrl();

//$cs->registerScriptFile('http://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PC5YaAxHJF303X_pR-LSyeodnO-oicuY&id=mymap', CClientScript::POS_END);
//$cs->registerScriptFile($pathToAssets.'/js/'.'jquery.mask.js', CClientScript::POS_END);

print($model->wswg_body);

?>
<script>
            $(document).ready(function(){
                  $('.phone_us').mask('+7 (000) 000-00-00');
                  $('.date').mask('00/00/0000');
                  $('.time').mask('00:00');
            });
        </script>

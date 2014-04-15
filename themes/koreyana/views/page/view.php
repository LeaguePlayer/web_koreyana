<?php
$cs = Yii::app()->clientScript;
$pathToAssets=$this->getAssetsUrl();

//$cs->registerScriptFile('http://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PC5YaAxHJF303X_pR-LSyeodnO-oicuY&id=mymap', CClientScript::POS_END);
//$cs->registerScriptFile($pathToAssets.'/js/'.'jquery.mask.js', CClientScript::POS_END);

print($model->wswg_body);

?>

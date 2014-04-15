<?php
$cs = Yii::app()->clientScript;
$pathToAssets=$this->getAssetsUrl();

print($model->wswg_body);

?>
<script>
            $(document).ready(function(){
                  $('.phone_us').mask('+7 (000) 000-00-00');
                  $('.date').mask('00/00/0000');
                  $('.time').mask('00:00');
            });
        </script>

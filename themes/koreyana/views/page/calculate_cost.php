<?if (true){?>
<?

      $cs=Yii::app()->clientScript;
      $cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.progressTimer.min.js');
      
      $cs->registerCssFile('http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css');
      $cs->registerScriptFile('http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js');

        $model=new CalculateCost;
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'calculate-form',
            'action'=>$this->createUrl('/calls/calculateCost'),
            'enableClientValidation' => true,
            'clientOptions' => array(
              'validateOnSubmit' => true,
              'afterValidate' => "js: function(form, data, hasError) {
                if ( hasError ) return;
                form = $(form);
                if ($('.part-1').css('display')!='none')
                {
                    $('#progressTimer').closest('.row').removeAttr('style').hide().fadeIn(300,function(){
                        $('#progressTimer').progressTimer({
                          timeLimit: 5,
                          warningThreshold: 10,
                          baseStyle: 'progress-bar-warning',
                          warningStyle: 'progress-bar-danger',
                          completeStyle: 'progress-bar-info',
                          onFinish: function() {
                            $('.part-1').slideUp();
                            $('.part-2').slideDown();
                            $('#progressTimer').fadeOut();
                          } 
                        });
                    });
                    
                } else {
                  $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize()+'&scenario=fake',
                    dataType: 'json',
                    success: function(data) {
                      if (data.success){
                          window.location.href='/page/thanks';
                      }
                      else{
                      }
                    },
                    error:function(data){
                      console.log(data);
                    }
                  });
                }
              }"
            ),
        )); ?>
        <div class="caption">Узнать стоимость стекла на свой автомобиль</div>
        <div class="part-1">
          <div class="row" style="visibility: hidden;">
            <label>Выполняется расчет</label>
            <div id="progressTimer"></div>
          </div>
          <div class="row">
              <?php echo $form->labelEx($model,'id_brand'); ?>
              <?php echo $form->dropDownList($model,'id_brand',CalculateCost::getBrands(),array('empty'=>'Выберите марку автомобиля')); ?>
              <?php echo $form->error($model,'id_brand'); ?>
          </div>

          <div class="row">
              <?php echo $form->labelEx($model,'model'); ?> 
              <?php echo $form->textField($model,'model'); ?>
              <?php echo $form->error($model,'model'); ?>
          </div>
          <div class="row">
              <?php echo $form->labelEx($model,'year'); ?>
              <?php echo $form->dropDownList($model,'year',CalculateCost::getYears(),array('empty'=>'Выберите год выпуска...'));?>
              <?php echo $form->error($model,'year'); ?>
          </div>
          <div class="row">
              <?php echo $form->labelEx($model,'id_basket'); ?>
              <?php echo $form->dropDownList($model,'id_basket',CalculateCost::getBasketType(),array('empty'=>'Выберите кузов')); ?>
              <?php echo $form->error($model,'id_basket'); ?>
          </div>
          <!-- <div class="row">
              <?//php echo $form->labelEx($model,'id_glass'); ?>
              <?//php echo $form->dropDownList($model,'id_glass',CalculateCost::getGlassTypes(),array('empty'=>'Выберите тип стекла...')); ?>
              <?//php echo $form->error($model,'id_glass'); ?>
          </div> -->
          <div class="row">
              <?php echo $form->labelEx($model,'comment'); ?>
              <?php echo $form->textarea($model,'comment'); ?>
              <?php echo $form->error($model,'comment'); ?>
          </div>
          <div class="clear"></div>
          <div class="row">
            <label></label>
                <?=CHtml::submitButton('Отправить',array('id'=>'submit'))?>
          </div>
        </div>
        <div class="part-2" style="display:none;">
          <div class="row">
            <div class="caption">Расчет выполнен!<br> 
              Оставьте свои данные, чтобы наш специалист связался с вами и согласовал время заезда на СТО.
            </div>
          </div>
          <div class="row">
              <?php echo $form->labelEx($model,'name'); ?>
              <?php echo $form->textField($model,'name');?>
              <?php echo $form->error($model,'name'); ?>
          </div>
          <div class="row">
              <?php echo $form->labelEx($model,'phone'); ?> 
              <?php echo $form->textField($model,'phone'); ?>
              <?php echo $form->error($model,'phone'); ?>
          </div>
          <div class="clear"></div>
          <div class="row">
            <label></label>
                <?=CHtml::submitButton('Узнать стоимость и получить скидку!',array('id'=>'submit'))?>
          </div>
        </div>

    <?$this->endWidget(); ?>
<?}?>
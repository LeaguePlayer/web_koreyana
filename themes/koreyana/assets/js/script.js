$(document).ready(function(){

	//$(".phone_us").mask("+7 (000) 000-00-00");
	//========= Form Validating start ================

	$('#formsubmit').click(function(){
        var form = $('#form-services');
		$.ajax({
            url: "/record/AjaxAddRecord",
            dataType:'JSON',
            method:'POST',
            data:form.serialize(),
            success:function(data) {
                $('.errorMessage', form).hide();
                $('input, textarea').removeClass('error')
                if (data.success==true) {
                    document.location.href="/page/thanks";
                } else {
                    for (var i in data.errors) {
                        var input = $('input[name="Record['+i+']"]').addClass('error');
                        var errorMessage = input.next('.errorMessage');
                        if ( !errorMessage.length ) {
                            errorMessage = $('<div></div>').addClass('errorMessage').hide().insertAfter(input);
                        }
                        errorMessage.text(data.errors[i]).show();
                    }
                }
            },
            error: function() {
            alert("Произошла ошибка на сервере, Ваши данные не были отправленны!");
            }
		});
		return false;
	});
	$('#submitContacts').click(function(){

		$.ajax({
		  url: "/calls/AjaxCreate",
		  dataType:'JSON',
		  method:'POST',
		  data:$('#form-services').serialize(),

		  success:function(data)
		  {

		  	console.log(data);

		  	if (data.success==true)
		  	{
		  		document.location.href="/page/thanks";
		  	} 
		  	else
			{
				$(document).scrollTop(0);
				for (var i in data.error)
				{
					$('input[name="Calls['+i+']"]').addClass('error');
				}
		  	}
		  },

		  error:function(){
		  	alert("Произошла ошибка на сервере, Ваши данные не были отправленны!");
		  }

		})
		return false;

	})
	//========= Form Validating end ================
	// ======= клик по ссылке "Показать все характеристики" ============//
	if ($('.hide').length>0)
	{
	    $('.hide').toggle(

    	  function(){
        	$('.hide').slideDown(500);
        	$(this).html('Показать все характеристики');
      	}, 

          function(){
        	$('.hide').slideUp(500);
        	$(this).html('Скрыть');
     	}
   );
	}
    $('.phone_us').mask('+7 (000) 000-00-00');
    $('.date').mask('99/99/9999');
    $('.time').mask('99:99');
    $('.Tel').mask('+7 (000) 000-00-00');

    $('#callBtn').on('click', function() {
        var $this = $(this);
        $.fancybox.open($('#callBox'), {
            padding: 0,
            afterShow: function() {
                $('a.close', this.inner).click(function(e) {
                    $.fancybox.close();
                    return false;
                });
            }
        });
        return false;
    });

    $('#driveOrder').on('click', function() {
        var $this = $(this);
    });
    
    /*$('#sendVacansy').click(function(){
    	$.ajax({
    		type:'POST',
    		dataType:'JSON',
    		url:'/vacansy/AjaxAddVacancy',
    		data:$('#vacansy_form').serialize(),
    		success:function(data)
    		{
    			console.log(data);
    			//document.location.href="/page/thanks";
    		},
    		error:function(data){

    			var error="Заполните следующие поля ";
    			alert(error);
    		}
    	});
    	return false;
    })*/
//    $('#submit').click(function(){
//    	$.ajax({
//    		type:'POST',
//    		dataType:'JSON',
//    		url:'/calls/AjaxCreate',
//    		data:$('#login').serialize(),
//
//    		success:function(data)
//    		{
//    			alert('Ваша заявка отправлена!');
//    			$('#login text,#login textarea,#login radio').val('');
//    		},
//    		error:function(data){
//
//    			var error="Заполните следующие поля ";
//    		}
//    	})
//    	return false;
//    })

    if ($('.QapTcha').length)
    	$('.QapTcha').QapTcha({
    		txtLock: 'Пожалуйста, перетащите ползунок вправо',
    		txtUnlock: 'Поздравляем, антиспам-проверка пройдена!',
    		PHPfile: '/record/qaptcha/'
    	});

    //Яндекс карта
    YMaps.jQuery(function () {
    		if ($('#map-1').length) {
	            map = new YMaps.Map(document.getElementById("map-1"));
	            map.setCenter(new YMaps.GeoPoint(65.610002,57.152867), 17);
	            map.addControl(new YMaps.TypeControl());
				map.addControl(new YMaps.ToolBar());
				map.addControl(new YMaps.Zoom());
	            var placemark = new YMaps.Placemark(new YMaps.GeoPoint(65.610002,57.152867), {style: "default#carIcon"});
	            placemark.name = "Центральный филиал: ул. Дамбовская, 10";
				placemark.description = "+7 (3452) 500-480 (отдел продаж)<br /> +7 (3452) 986-185 (СТО)<br /> +7 (3452) 637-909<br /> +7 (3452) 710-999";

	            map.addOverlay(placemark);
    		}
    		if ($('#mymap').length) {
	            map = new YMaps.Map(document.getElementById("mymap"));
	            map.setCenter(new YMaps.GeoPoint(65.610002,57.152867), 17);
	            map.addControl(new YMaps.TypeControl());
				map.addControl(new YMaps.ToolBar());
				map.addControl(new YMaps.Zoom());
	            var placemark = new YMaps.Placemark(new YMaps.GeoPoint(65.610002,57.152867), {style: "default#carIcon"});
	            placemark.name = "Центральный филиал: ул. Дамбовская, 10";
				placemark.description = "+7 (3452) 500-480 (отдел продаж)<br /> +7 (3452) 986-185 (СТО)<br /> +7 (3452) 637-909<br /> +7 (3452) 710-999";

	            map.addOverlay(placemark);
    		}
        });
});
$(document).ready(function(){

	//$(".phone_us").mask("+7 (000) 000-00-00");
	//========= Form Validating start ================

	$('#formsubmit').click(function(){
		$.ajax({
		  url: "/record/AjaxAddRecord",
		  dataType:'JSON',
		  method:'POST',
		  data:$('#form-services').serialize(),

		  success:function(data)
		  {

		  	console.log(data);

		  	if (data.success==true)
		  	{
		  		document.location.href="http://koreyana.local/page/thanks";
		  	} 
		  	else
			{
				$(document).scrollTop(0);
				for (var i in data.error)
				{
					$('input[name="Record['+i+']"]').addClass('error');
				}
		  	}
		  },

		  error:function(){
		  	alert("Произошла ошибка на сервере, Ваши данные не были отправленны!");
		  }

		})
		return false;
	});
	$('.bt-4 a').click(function(){

		$.ajax({
		  url: "/vacansy/AjaxAddVacancy",
		  dataType:'JSON',
		  method:'POST',
		  data:$('#form-services').serialize(),

		  success:function(data)
		  {

		  	console.log(data);

		  	if (data.success==true)
		  	{
		  		document.location.href="http://koreyana.local/page/thanks";
		  	} 
		  	else
			{
				$(document).scrollTop(0);
				for (var i in data.error)
				{
					$('input[name="Record['+i+']"]').addClass('error');
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
        	console.log('123');
      	}, 

          function(){
        	$('.hide').slideUp(500);
        	$(this).html('Скрыть');
        	console.log('123');
     	}
   );
	}
    $('.phone_us').mask('+7 (000) 000-00-00');
    $('.date').mask('99/99/9999');
    $('.time').mask('99:99');
    $('.Tel').mask('+7 (000) 000-00-00');

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
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
		  		document.location.href="/page/thanks";
		  	} 
		  	else
			{
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

    $('#callBtn').on('click', function() {
        $this = $(this);
        $.fancybox.open($('#callBox'), {
            afterShow: function() {
                $('a.close', this.inner).click(function(e) {
                    $.fancybox.close();
                    return false;
                });
            }
        });
        return false;
    })
    
    $('#sendVacansy').click(function(){
    	$.ajax({
    		type:'POST',
    		dataType:'JSON',
    		url:'/vacansy/AjaxAddVacancy',
    		data:$('#vacansy_form').serialize(),
    		success:function(data)
    		{
    			document.location.href="/page/thanks";
    		},
    		error:function(data){

    			var error="Заполните следующие поля ";
    			alert(error);
    		}
    	});
    	return false;
    })
    $('#submit').click(function(){
    	$.ajax({
    		type:'POST',
    		dataType:'JSON',
    		url:'/calls/AjaxCreate',
    		data:$('#login').serialize(),

    		success:function(data)
    		{
    			alert('Ваша заявка отправлена!');
    			$('#login text,#login textarea,#login radio').val('');
    		},
    		error:function(data){

    			var error="Заполните следующие поля ";
    		}
    	})
    	return false;
    })
});
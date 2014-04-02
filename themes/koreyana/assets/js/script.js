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

	//========= Form Validating end ================
});
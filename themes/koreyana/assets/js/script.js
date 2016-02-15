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
                $('input, textarea').removeClass('error');
                console.log(data);
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
     	});
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
        // var $this = $(this);
    });

    $('input[type=file]').on('change',function(){
        var $_str=$(this).val();
            $_str=$_str.substring($_str.lastIndexOf('\\')+1,$_str.length);
        if ($_str)
            $_str=$_str ? $_str.substring($_str.lastIndexOf('/')+1,$_str.length) : "Прикрепить резюме";
       $('.attechFile span').text($_str);
    })

    if ($('#Resume_dt_birthday').length>0)
    {
        $('#Resume_dt_birthday').datepicker();
    }

    var detailCarusel=$('.carousel-detail');
    if (detailCarusel.length>0)
        detailCarusel.owlCarousel({
            items:1,
            loop:true,
            margin:0,
            nav:true,
            navText:[]
        });

    if ($('.QapTcha').length)
    	$('.QapTcha').QapTcha({
    		txtLock: 'Пожалуйста, перетащите ползунок вправо',
    		txtUnlock: 'Поздравляем, антиспам-проверка пройдена!',
    		PHPfile: '/record/qaptcha/'
    	});

    $('.showForm').click(function(){
        
        if ($('#resume-form').css('display')=='none')
            $('#resume-form').slideDown(500);
        else 
            $('#resume-form').slideUp(500);
        return false;
    });
    $('.fancy').on('click',function(){
        $.fancybox.open($('#question'),{
            padding: 0,
            afterShow: function() {
                $('a.close', this.inner).click(function(e) {
                    $.fancybox.close();
                    return false;
                });
            }
        });  
    })
});
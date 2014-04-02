(
       function($){
            $.fn.shuffle = function() {
               return this.each(function(){
                   var items = $(this).children();
                    return (items.length)
                       ? $(this).html($.shuffle(items,$(this)))
                   : this;
               });
           }
            $.fn.validate = function() {
               var res = false;
               this.each(function(){
                   var arr = $("#sortable").children();            
                   res = ((arr[0].innerHTML=='<img src="images/icon/captcha-a.png" alt="8080">')&&
                       (arr[1].innerHTML=='<img src="images/icon/captcha-v.png" alt="5432">')&&
                       (arr[2].innerHTML=='<img src="images/icon/captcha-t.png" alt="1234">')&&
                       (arr[3].innerHTML=='<img src="images/icon/captcha-o.png" alt="7272">'));
               });
               return res;
           }
            $.shuffle = function(arr,obj) {
               for(
               var j, x, i = arr.length; i;
               j = parseInt(Math.random() * i),
               x = arr[--i], arr[i] = arr[j], arr[j] = x
           );
               if(arr[0].innerHTML=="А") obj.html($.shuffle(arr,obj))
               else return arr;
           }
        })(jQuery);
        $(function() {
           $("#sortable").sortable();
           $("#sortable").disableSelection();
           $('ul').shuffle();
            $("#formsubmit").click(function(){
               ($('ul').validate()) ? alert("Ваша заявка принята!") : alert("Проверьте, все ли поля заполнены!");
           });
});
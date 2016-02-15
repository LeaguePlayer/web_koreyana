jQuery(function($) {

    String.prototype.replaceAll = function(search, replace){
        return this.split(search).join(replace);
    }

    var del = $(".del");

    $("#add").on('click', function() {

        var block = $(".blocks").html().replaceAll("["+($(".block_1").length)+"]","["+($(".block_1").length+1)+"]");

        $(".blocks").append(block).find('.del').parent().parent().show();
        
        return false;
    });

    $(document).on("click", "a.del", function() {
        $(this).parent().parent().parent().remove();
        if ($(".del").length == 1) {
            $(".del").parent().parent().hide();
        }
        ;
        return false;
    });
    



    $("#add1").on('click', function() {

        var block2 = $(".blocks_2").html().replaceAll("["+$(".block_2").length+"]","["+($(".block_2").length+1)+"]");

        $(".blocks_2").append(block2).find('.del1').show();
        return false;
    });

    $(document).on("click", "a.del1", function() {
        $(this).parent().parent().parent().remove();
        if ($(".del1").length == 1) {
            $(".del1").hide();
        };

        return false;
    });


});

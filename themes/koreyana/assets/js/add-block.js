jQuery(function($) {
    var block = $(".blocks").html();
    var del = $(".del");

    $("#add").on('click', function() {
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
    
    var block2 = $(".blocks_2").html();


    $("#add1").on('click', function() {
        $(".blocks_2").append(block2).find('.del1').show();
        return false;
    });

    $(document).on("click", "a.del1", function() {
        $(this).parent().parent().parent().remove();
        if ($(".del1").length == 1) {
            $(".del1").hide();
        }
        ;
        return false;
    });


});

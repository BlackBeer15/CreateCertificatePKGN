$(document).on('change', '.select-cert', function(){
    if ($('.select-cert').val() === "О стипендии") {
        $('.date-rate').css({"display":"flex"});
    } else {
        $('.date-rate').css({"display":"none"});
    }
});
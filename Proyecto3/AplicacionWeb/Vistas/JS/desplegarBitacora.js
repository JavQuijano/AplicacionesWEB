$(document).ready(function(){
    var ajaxurl = 'despliegueBitacora.php',
        data =  {'action': 'bitacora'};
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        $("#tablaBitacora").html(response);
    });
});
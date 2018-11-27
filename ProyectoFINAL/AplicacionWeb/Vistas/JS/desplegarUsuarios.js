$(document).ready(function(){
    var ajaxurl = 'despliegueUsuarios.php',
        data =  {'action': 'user'};
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        $("#bodyTablaUser").html(response);
    });
});

$(document).on('click', '#save', function(){
    var parentRow = $(this).closest('tr');
    var rowData = new Array();
    rowData ={
        "ClvUsuarios" : $(parentRow).find("td:eq(0)").text()
        , "nombreUsuario" : $(parentRow).find("td:eq(1)").text()
        , "PreguntaSeguridad" : $(parentRow).find("td:eq(2)").text()
        , "Respuesta" : $(parentRow).find("td:eq(3) input[type='text']").val()
        , "Estado": $(parentRow).find("td:eq(4) input[type='checkbox']").is(':checked')
    };
    rowData = $.toJSON(rowData);
    $.ajax({
        type: "POST",
        url: "despliegueUsuarios.php",
        data: "update=" + rowData,
        success: function(msg){
            alert(msg);
        }
    });
});


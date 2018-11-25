$(document).ready(function(){
    var ajaxurl = 'despliegueAdmin.php',
        data =  {'action': 'admin'};
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        $("#bodyTabla").html(response);
    });
});

$(document).on('click', '#save', function(){
    var parentRow = $(this).closest('tr');
    var rowData = new Array();
    rowData ={
        "ClvSalon" : $(parentRow).find("td:eq(0)").text()
        , "nombreSalon" : $(parentRow).find("td:eq(1)").text()
        , "Materia" : $(parentRow).find("td:eq(2)").text()
        , "HoraInicio" : $(parentRow).find("td:eq(3) input[type='text']").val()
        , "HoraFin": $(parentRow).find("td:eq(4) input[type='text']").val()
    }
    rowData = $.toJSON(rowData);
    $.ajax({
        type: "POST",
        url: "despliegueAdmin.php",
        data: "update=" + rowData,
        success: function(msg){
            alert(msg);
        }
    });
});

$(document).on('click', '#delete', function(){
    var parentRow = $(this).closest('tr');
    var rowData = new Array();
    rowData ={
        "ClvSalon" : $(parentRow).find("td:eq(0)").text()
        , "nombreSalon" : $(parentRow).find("td:eq(1)").text()
        , "Materia" : $(parentRow).find("td:eq(2)").text()
        , "HoraInicio" : $(parentRow).find("td:eq(3) input[type='text']").val()
        , "HoraFin": $(parentRow).find("td:eq(4) input[type='text']").val()
    }
    rowData = $.toJSON(rowData);
    $.ajax({
        type: "POST",
        url: "despliegueAdmin.php",
        data: "delete=" + rowData,
        success: function(msg){
            $(this).closest('tr').remove();
            alert(msg);
        }
    });

});

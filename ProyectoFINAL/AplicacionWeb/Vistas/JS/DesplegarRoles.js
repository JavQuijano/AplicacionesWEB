$(document).ready(function(){
    $('#admin').change(function() {
        alert("asdasdasd");
        var botonApretado = this;
        var parentRow = $(this).closest('tr');
        var rowData = new Array();
        rowData =
            {
                "nomreUsuario" : $(parentRow).find("td:eq(0)").text()
                , "estado" : $(this).checked()
                , "rol" : "admin"
            }
        rowData = $.toJSON(rowData);
        $.ajax({
            type: "POST",
            url: "despliegueRoles.php",
            data: "update=" + rowData,
            success: function(msg){
                alert(msg);
            }
        });
    });
});
$('#user').change(function(){
    var botonApretado = this;
    var parentRow = $(this).closest('tr');
    var rowData = new Array();

    rowData =
        {
            "nomreUsuario" : $(parentRow).find("td:eq(0)").text()
            , "estado" : $(this).checked()
            , "rol" : "user"
        }
    rowData = $.toJSON(rowData);
    $.ajax({
        type: "POST",
        url: "despliegueRoles.php",
        data: "update=" + rowData,
        success: function(msg){
            alert(msg);
        }
    });
});
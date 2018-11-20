// JavaScript Document

function selSalon(id){
    //Browser Support Code
    var ARequest;  // The variable that makes Ajax possible!
    try {
        // Opera 8.0+, Firefox, Safari
        ARequest = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer Browsers
        try {
            ARequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ARequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ARequest.onreadystatechange = function() {
        if (ARequest.readyState === 4 && ARequest.status === 200) {
            document.getElementById("widget").innerHTML =
                ARequest.responseText;
        }
    };
    ARequest.open("GET", "./Salones/"+id+".html", true);
    ARequest.send();
}
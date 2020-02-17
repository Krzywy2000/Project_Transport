document.getElementById("drive").addEventListener("keyup", drive);
 
function drive() {
    
    var drive = document.getElementById("drive").value;
     
        var ajax = new XMLHttpRequest();
         
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById("forms").innerHTML = ajax.responseText;
            }
        };
         
        ajax.open("GET", "./scripts/php/add_forms.php?add_forms="+drive, true);
 
        ajax.send();
    
}
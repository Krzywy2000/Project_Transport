
document.getElementById("departure").addEventListener("keyup", departure);
document.getElementById("destination").addEventListener("change", destination);
 
function departure() {
    
    var departure = document.getElementById("departure").value;
    var destination = document.getElementById("destination").value;
     
        var ajax = new XMLHttpRequest();
         
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById("arrival").innerHTML = ajax.responseText;
            }
        };
         
        ajax.open("GET", "./scripts/php/timetables/add_arrival.php?add_arrival="+departure, true);
        ajax.open("GET", "./scripts/php/timetables/add_arrival.php?add_destination="+destination, true);
 
        ajax.send();
    
}
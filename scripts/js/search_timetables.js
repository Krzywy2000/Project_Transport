document.getElementById("search_timetables").addEventListener("keyup", search_timetables);
 
function search_timetables() {
    
    var search_timetables = document.getElementById("search_timetables").value;
     
        var ajax = new XMLHttpRequest();
         
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById("timetable").innerHTML = ajax.responseText;
            }
        };
         
        ajax.open("GET", "./scripts/php/timetables/search_timetables.php?search_timetables="+search_timetables, true);
 
        ajax.send();
    
}
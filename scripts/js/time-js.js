function updateClock() {
    var now = new Date(), // current date
        hour = now.getHours(),
        min = now.getMinutes(),
        sec = now.getSeconds(),
        months = ['Styczeń' , 'Luty' ,  'Marzec' , 'Kwiecień' , 'Maj' , 'Czerwiec' , 'Lipiec' , 'Sierpień' , 'Wrzesień' , 'Październik' , 'Listopad' , 'Grudzień']; // you get the idea
        time = hour + " : " + ((min<10)?"0":"") + min + " : " + ((sec<10)?"0":"") + sec, // again, you get the idea

        // a cleaner way than string concatenation
        date = [now.getDate(), 
                months[now.getMonth()],
                now.getFullYear()].join(' ');

    // set the content of the element with the ID time to the formatted string
    document.getElementById('label-time').innerHTML = [date, time].join(' / ');

    // call this function again in 1000ms
    //setTimeout(updateClock, 1000);
}
//updateClock(); // initial call
setInterval('updateClock',1000);
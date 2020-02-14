<footer class="footer-distributed">
    <div class="container-fluid">
        <div class="footer__left col-md-6 col-sm-12">
            <p>Copyright &copy 2020 by <a href="http://wiktorwiese.000webhostapp.com/">Wiktor Wiese</a></p>
        </div>
        <div class="footer__right col-md-6 col-sm-12">
           
        </div>
    </div>
    <script type="text/javascript">
                            function zegar(){
                                var date = new Date();
                                var hour = date.getHours();
                                var min = date.getMinutes();
                                var sec = date.getSeconds();
                                var terazjest = ""+hour+((min<10)?":0":":")+min+((sec<10)?":0":":")+sek;
                                document.getElementById("zegar").innerHTML = terazjest;
                                setTimeout("zegar()",1000);
                            }
                        </script>  
</footer>
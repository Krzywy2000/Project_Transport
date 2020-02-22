<footer class="footer-distributed">
    <div class="container-fluid">
        <div class="footer__left col-md-6 col-sm-12">
            <p>Copyright &copy <?php
                $year = date("Y");
                if($year == '2020')
                {
                    echo $year;
                } else {
                    echo "2020 - ".$year;
                }
                
            ?>
            by <a href="http://wiktorwiese.000webhostapp.com/">Wiktor Wiese</a></p>
        </div>
        <div class="footer__right col-md-6 col-sm-12">
           
        </div>
    </div>
</footer>
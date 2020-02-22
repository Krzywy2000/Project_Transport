<?php


    if($_SESSION['access'] == '1')
    {
        echo "Admin";
    }

    if($_SESSION['access'] == '2')
    {
        echo "Gorzów Wiktorowski";
    }

    if($_SESSION['access'] == '3')
    {
        echo "Gorzowska Góra";
    }

    if($_SESSION['access'] == '4')
    {
        echo "Batorz";
    }

    if($_SESSION['access'] == '5')
    {
        echo "Doły Gorzowskie";
    }
    
?>
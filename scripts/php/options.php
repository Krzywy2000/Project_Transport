<?php

    if($_SESSION['access'] == '1')
    {
        echo '<a class="dropdown-item" href="#">Panel</a>';
        echo '<a class="dropdown-item" href="index_admin.php?page=rolling_stock">Tabor</a>';
        echo '<a class="dropdown-item" href="index_admin.php?page=user_list">Rozkłady</a>';
        echo '<a class="dropdown-item" href="index_admin.php?page=new_user">Dodaj nowego użytkonika</a>';
        echo '<a class="dropdown-item" href="index_admin.php?page=options">Ustawienia</a>';
        echo '<a class="dropdown-item" href="./scripts/php/logoff.php">Wyloguj</a>';
    }

    if($_SESSION['access'] == '2' | $_SESSION['access'] == '3' | $_SESSION['access'] == '4' | $_SESSION['access'] == '5')
    {
        echo '<a>'.$_SESSION['name'].' '.$_SESSION['surname'].'</a>';
        echo '<a class="dropdown-item" href="index_user.php?page=rolling_stock">Tabor</a>';
        echo '<a class="dropdown-item" href="index_user.php?page=timetables">Rozkłady</a>';
        echo '<a class="dropdown-item" href="index_user.php?page=workshop">Warsztat</a>';
        echo '<a class="dropdown-item" href="index_user.php?page=plans">Przydział wozów</a>';
        echo '<a class="dropdown-item" href="index_admin.php?page=options">Ustawienia</a>';
        echo '<a class="dropdown-item" href="./scripts/php/logoff.php">Wyloguj</a>';
    }

?>
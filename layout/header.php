<?php
    session_start();
?>

<html>
    <head>
        <title>eDyspozytor</title>

        <!--Links!-->
        <link rel="stylesheet" type="text/css" href="./styles/style_main.css">
        <link rel="stylesheet" type="text/css" href="./styles/style_pages.css">
        <link rel="stylesheet" type="text/css" href="./styles/bootstrap/bootstrap.min.css">

        <!--Scripts!-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/6a2e60bfe6.js"></script>
        <script src="./scripts/bootstrap/bootstrap.bundle.min.js"></script>

        <!--Meta_tags!-->
        <meta author="Wiktor Wiese">
        <meta charset="UTF-8">

    </head>
    <body>
        <header>
            <div class="col-sm-12">
                <nav class="navbar navbar-expand navbar-dark">
                    <a class="navbar-brand" href="<?php
                        if($_SESSION['access']=="1")
                        {
                            echo "index_admin.php";
                        }

                        if($_SESSION['access'] == "2")
                        {
                            echo "index_user.php";
                        }
                    ?>">eDyspozytor</a>
                    <span class="navbar text">
                    <?php
                            $year = date("Y");
                            $day = date("d");
                            $mounth = date("j");
                            echo $day."/".$mounth."/".$year;
                    ?>
                    </span>
                    <div class="navbar text" id="zegar">

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
                                <?php
                                    require_once('./scripts/php/header.php');
                                ?>
                                <span class="caret"></span></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php
                                        require_once('./scripts/php/options.php')
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>          
        </header>
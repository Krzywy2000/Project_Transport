<?php
    include("./layout/header.php");
    $toInclude = isset($_GET['page']) ? $_GET['page']:"main";
    include("./pages/user/$toInclude.php");
    include("./layout/footer.php");
?>
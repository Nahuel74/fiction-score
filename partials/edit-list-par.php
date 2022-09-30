<?php 
    $userid = $_SESSION["id"];
    $fid = $_GET["id"];

    require_once "../partials/database-par.php";
    require_once "../partials/functions-list-par.php";

    if (isset($_GET["id"])){

        if (checkProperty($connection, $userid, $fid) === false){
            header("location: ../links/list.php?error=nopermission");
            exit();
        }
        else {
            displayFiction($connection, $userid, $fid);
        }
    }
?>

<?php 
    session_start();

   if (isset($_SESSION["id"])){
   
    $fid = $_POST["fid"];

    require_once "../partials/database-par.php";
    require_once "../partials/functions-list-par.php";
    
    deleteFiction($connection, $fid);
}
    else{
        header("location: /index.php?error=nologin");
    }

?>
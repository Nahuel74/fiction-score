<?php 
    session_start();

   if (isset($_SESSION["id"])){
   
   $fname = $_POST["fname"];
    $fcat = $_POST["fcat"];
    $fmain = $_POST["fmain"];
    $fsecond = $_POST["fsecond"];
    $fant = $_POST["fant"];
    $fscript = $_POST["fscript"];
    $fper = $_POST["fper"];
    $fextra = $_POST["fextra"];
    $fscore = $_POST["fscore"];
    $fid = $_POST["fid"];

    require_once "../partials/database-par.php";
    require_once "../partials/functions-list-par.php";

    if (emptyInputs($fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra) !== false){

        header("location: /list.php?error=emptyinput");
        exit();
    }
    
    updateFiction($connection, $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore, $fid);
}
    else{
        header("location: /index.php?error=nologin");
    }

?>
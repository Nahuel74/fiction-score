<?php 
    session_start();

    if (isset($_SESSION["id"], $_POST["submit"])){
   
        $fname = $_POST["fname"];
        $fcat = $_POST["fcat"];
        $fmain = $_POST["fmain"];
        $fsecond = $_POST["fsecond"];
        $fant = $_POST["fant"];
        $fscript = $_POST["fscript"];
        $fextra = $_POST["fextra"];
        $fscore = $_POST["fscore"];
        $fid = $_POST["fid"];

        require_once "../partials/database-par.php";
        require_once "../partials/functions-list-par.php";

        if ($_POST["submit"]=="save"){

            if (emptyInputs($fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fextra) !== false){

                header("location: /links/list.php?error=emptyinput");
                exit();
            }
            else {
                updateFiction($connection, $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fextra, $fscore, $fid);
            }    
        }
        else if ($_POST["submit"]=="delete"){
            deleteFiction($connection, $fid);
        }
    }
    else{
        header("location: /index.php?error=nologin");
    }

?>
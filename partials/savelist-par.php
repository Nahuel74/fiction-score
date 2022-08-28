<?php
    session_start();

    if (isset($_POST["submit"]) && isset($_SESSION["id"])){

        require_once "database-par.php";
        require_once "functions-savelist-par.php";

        $userid = $_SESSION["id"];
        $fname = $_POST["fname"];
        $fcat = $_POST["fcat"];
        $fmain = $_POST["fmain"];
        $fsecond = $_POST["fsecond"];
        $fant = $_POST["fant"];
        $fscript = $_POST["fscript"];
        $fper = $_POST["fper"];
        $fextra = $_POST["fextra"];
        $fscore = $_POST["fscore"];

        if (emptyInputs($fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra) !== false){

            header("location: /index.php?error=emptyinput");
            exit();
        }

        if (fictionExist($connection, $fname) !== false){

            header("location: /index.php?error=fictionexist");
            exit();
        }

        saveFiction($connection, $fname, $fcat, $fmain, $fsecond, $fant, $fscript, $fper, $fextra, $fscore, $userid);

    }
    else{
        header("location: /index.php?error=nologin");
    }
?>
<?php 

    if (isset($_SESSION["id"])){
        
        require_once "database-par.php";
        require_once "functions-list-par.php";

        $userid = $_SESSION["id"];

        if (userHasFiction($connection, $userid) === false){

            header("location: /index.php?error=nofiction");
            exit();
        }
        else {
            displayList($connection, $userid);
        }

    }
     else{
         header("location: /index.php?error=nologin");
     }

?>
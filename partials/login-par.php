<?php 

if (isset($_POST["submit"])){
        
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "database-par.php";
    require_once "functions-sign-par.php";

    if (emptyInputLogin($username, $password) !== false){
        header("location: ../links/login.php?error=emptyinput");
        exit();
    }

    loginUser($connection, $username, $password);
}
else {
    header("location: ../links/login.php");
}

?>
<?php 
    if (isset($_POST["submit"])){
        
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmedPassword = $_POST["confirmed-password"];

        require_once "database-par.php";
        require_once "functions-par.php";

        if (emptyInputSignup($username, $email, $password, $confirmedPassword) !== false){
            header("location: ../links/signup.php?error=emptyinput");
            exit();
        }

        if (invalidUsername($username) !== false){
            
            header("location: ../links/signup.php?error=invalidusername");

            exit();
        }

        if (invalidEmail($email) !== false){
            
            header("location: ../links/signup.php?error=invalidemail");
            exit();
        }

        if (passwordMatch($password, $confirmedPassword) !== false){
            header("location: ../links/signup.php?error=passworderror");
            exit();
        }

        if (usernameExist($connection, $username, $email) !== false){
            
            header("location: ../links/signup.php?error=usernametaken");
            exit();
        }

        createUser($connection, $username, $email, $password);
    }
    else {
        header("location: ../links/signup.php");
    }
?>
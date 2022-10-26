<?php

function emptyInputSignup($username, $email, $password, $confirmedPassword){

    $result = "";

    if (empty($username) || empty($email) || empty($password) || empty($confirmedPassword)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $password){

    $result = "";

    if (empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
        
    $result = "";

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirmedPassword){
    $result = "";

    if ($password !== $confirmedPassword){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExist($connection, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../links/login.php?error=stmtfailed");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
    }

    $resultdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdata)){
        return $row;
    }
    else{ 
        $result = false;
    }
    return $result;

    mysqli_stmt_close($stmt);
}

function createUser($connection, $username, $email, $password){
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../links/signup.php?error=stmtfailed");
        exit();
    }
    else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header("location: ../links/login.php?error=none");
    exit();
}

function loginUser($connection, $username, $password) { 
    $userExist = usernameExist($connection, $username, $username);

    if ($userExist === false) {
        header("location: ../links/login.php?error=wronglogin");
        exit();
    }
    
    $hashedPassword = $userExist["password"];
    $checkPassword = password_verify($password, $hashedPassword);

   if ($checkPassword === false){
        header("location: ../links/login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["id"] = $userExist["id"];
        $_SESSION["username"] = $userExist["username"];
        header("location: /index.php");
        exit();
    }
}

?>
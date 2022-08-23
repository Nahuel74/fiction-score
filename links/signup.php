<?php 
    require "database.php";

    $message = "";

    if (!empty($_POSTL["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :username, :password)";
        $stmt = $connection -> prepare($sql);
        $stmt -> bindParam(":username", $_POST["username"]);
        $stmt -> bindParam(":email", $_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $stmt -> bindParam(":password", $_POST[$password]);
    }

    if ($stmt -> execute()){
        $message = "New user created";
    } else {
        $message = "An error ocurred";
    }

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiction Score!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin="crossorigin">
    <link
        href="https://fonts.googleapis.com/css2?family=Shojumaru&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main-style.css">
    <link rel="stylesheet" type="text/css" href="../css/signup-style.css">
</head>

<body>

    <?php require "../partials/header.php" ?>

    <?php if (!empty($message)): ?>
    <p> <?php $message ?> </p>
    <?php endif; ?>

    <div id="signup-background">
        <h2>Sign Up!</h2>
        <form action="login.php" method="post">
            <div id="signup-div-form">
                <input type="text" id="username" name="username" placeholder="username">
                <input type="email" id="email" name="email" placeholder="email">
                <input type="password" id="password" name="password" placeholder="password">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password">
                <button type="submit" id="signup-submit">Create</button>
            </div>
        </form>
    </div>
</body>
<?php 
    require "database.php";
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
    <link rel="stylesheet" type="text/css" href="../css/login-style.css">
</head>

<body>

    <?php require "../partials/header.php" ?>

    <div id="login-background">
        <h2>Log In!</h2>
        <form id="login-form">
            <div id="login-input">
                <input type="text" name="username" placeholder="username" required="required">
                <input type="password" name="passowrd" placeholder="password" required="required">
            </div>
            <button type="submit" id="login-submit">Log In</button>
        </form>
        <a id="signup-start" href="/links/signup.php">Create new account</a>
    </div>
</body>
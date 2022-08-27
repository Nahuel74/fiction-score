<?php 
    require "../partials/database-par.php";
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

    <?php require "../partials/header-par.php" ?>

    <?php if (!empty($message)): ?>
    <p> <?php $message ?> </p>
    <?php endif; ?>

    <div id="signup-background">
        <h2>Sign Up!</h2>
        <form action="../partials/signup-par.php" method="POST">
            <div id="signup-div-form">
                <input type="text" name="username" placeholder="username" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="password" name="confirmed-password" placeholder="Confirm your password" required>
                <button type="submit" name="submit" id="signup-submit">Create</button>
            </div>
        </form>
    <?php 
        if(isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Missing information, user was not created</p>";
            }
            else if($_GET["error"] == "invalidusername"){
                echo "<p>Invalid username</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo "<p>Invalid email</p>";
            }
            else if($_GET["error"] == "passworderror"){
                echo "<p>Password doesn't match</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p>Username taken</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something failed, please try again</p>";
            }
            else if($_GET["error"] == "none"){
                echo "<p>User created successfully</p>";
            }
    }
    ?>

    </div>
</body>
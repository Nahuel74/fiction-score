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
    <link rel="stylesheet" type="text/css" href="../css/login-style.css">
</head>

<body>

    <?php require "../partials/header-par.php" ?>

    <div id="login-background">
        <h2>Log In</h2>
        <form action="../partials/login-par.php" method="POST" id="login-form">
            <div id="login-input">
                <input type="text" name="username" placeholder="username or email" required>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <button type="submit" name="submit" id="login-submit">Log In</button>
        </form>
        <?php 
            if(isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<p>Missing information</p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something failed, please try again</p>";
                }
                else if($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect username or password</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p>User created successfully</p>";
                }
        }
    ?>
        <a id="signup-start" href="/links/signup.php">Create new account</a>
    </div>
</body>
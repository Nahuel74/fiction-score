<?php 
    require "../partials/database-par.php";
?>

<!DOCTYPE html>
<head>
    <?php require "../partials/head-par.php" ?>
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
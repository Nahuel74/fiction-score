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
    <link rel="stylesheet" type="text/css" href="../css\main-style.css">
    <link rel="stylesheet" type="text/css" href="../css\login-style.css">
</head>

<body>

    <header>
        <nav>
            <a href="../index.php">NEW</a>
            <a href="list.php">LIST</a>
            <a href="login.php">LOG IN</a>
        </nav>
    </header>

    <div id="login-background">
        <form id="login-form">
            <div id="login-input">
                <input type="text" placeholder="username" required="required">
                <input type="password" placeholder="password" required="required">   
            </div>
            <button type="submit" id="login-submit">Log In</button>
        </form>
        <button id="signup-start">Create new account</button>
    </div>
    <div id="signup-background">
        <div id="signup-title">
            <h2>Sign In!</h2>
            <button type="button" id="signup-stop">X</button>
        </div>
        <form>
            <div id="signup-div-form">
                <input type="text" id="username" placeholder="username" required>
                <input type="email" id="email" placeholder="email" required>
                <input type="password" id="password" placeholder="password" required>
                <button type="submit" id="signup-submit">Create</button>
            </div>
        </form>
    </div>
</body>
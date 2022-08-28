<!DOCTYPE html>
<html lang="en">

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
        <link rel="stylesheet" type="text/css" href="css/main-style.css">
        <link rel="stylesheet" type="text/css" href="css/index-style.css">
    </head>

    <body>

        <?php	require "partials/header-par.php" ?>

        <main>
        <?php 
                    if (isset($_GET["error"])){
                        if ($_GET["error"] == "nologin"){
                            echo "<p>Please Log In</p>";
                        }
                        if ($_GET["error"] == "emptyinput"){
                            echo "<p>Can't save an empty form</p>";
                        }
                        else if($_GET["error"] == "fictionexist"){
                            echo "<p>Fiction already exists</p>";
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo "<p>Something failed, please try again</p>";
                        }
                        else if ($_GET["error"] == "nofiction"){
                            echo "<p>You don't have fictions saved</p>";
                        }
                        else if($_GET["error"] == "none"){
                            echo "<p>Fiction saved</p>";
                        }
                    }
                ?>
            <h1 id="main-title">RATE THE MOVIE</h1>
            <form action="/partials/savelist-par.php" method="POST">
                <header>
                    <input placeholder="Name" name="fname" type="text" id="input-name" required>
                    <div>
                        <select name="fcat" id="select-category">
                            <option value="movie" class="option-category">Movie</option>
                            <option value="tv-show" class="option-category">TV Show</option>
                            <option value="anime" class="option-category">Anime</option>
                        </select>
                    </div>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>
                                <span class="th">Main<br>Character</span>
                            </th>
                            <th>
                                <span class="th">Secondary<br>Characters</span>
                            </th>
                            <th>
                                <span class="th">Antagonist</span>
                            </th>
                            <th>
                                <span class="th">Script</span>
                            </th>
                            <th>
                                <span class="th">Personal<br>Opinion</span>
                            </th>
                            <th>
                                <span class="th">Extra<br>points</span>
                            </th>
                            <th>
                                <span class="th">Score</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="td">
                                <input name="fmain" type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input name="fsecond" type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input name="fant" type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input name="fscript" type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input name="fper" type="number" min="-1" max="10" class="input-table">
                            </td>
                            <td class="td">
                                <input name="fextra" type="number" min="0" max="10" class="input-table unlisted" id="extra-points">
                            </td>
                            <td class="td">
                                <input name="fscore" type="number" readonly id="score">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <label>
                    "-1" will disable the cell</label>

                <button type="submit" name="submit" id="submit">Save</button>
            </form>

        </main>
    </body>

    <script type="text/javascript" src="js/dynamic-calculator.js"></script>
    <script type="text/javascript" src="js/change-title.js"></script>

</html>
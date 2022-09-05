<!DOCTYPE html>
<head>
    <?php require "../partials/head-par.php" ?>
    <link rel="stylesheet" type="text/css" href="../css/list-style.css">
</head>

<body>

    <?php
        require "../partials/header-par.php"; 
        require "../partials/must-log.php";
    ?>
    <?php 
        if (isset($_GET["error"])){
            if ($_GET["error"] == "nopermision"){
                echo "<p>You don't have access to edit that fiction</p>";
            }
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Can't save an empty form</p>";
            }
            if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something failed, please try again</p>";
            }
        }
    ?>
    <h2>Your fictions</h2>
    <table>
        <thead>
            <tr>
                <th>
                    <span class="th">Name</span>
                </th>
                <th>
                    <span class="th">Type</span>
                </th>
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
                <th>
                    <span class="th">Options</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php require_once "../partials/showlist-par.php";?>
        </tbody>
    </table>
</body>
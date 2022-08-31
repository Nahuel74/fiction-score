<?php 
    session_start();
?>

<header id="topbar">
    <nav>
        <a href="/index.php">NEW</a>
        <?php 
            if (isset ($_SESSION["id"])){
                echo "<a href='/links/list.php'>LIST</a>";
                echo "<a href='../partials/logout-par.php'>LOG OUT</a>";
            }
            else {
                echo "<a href='/links/login.php'>LOG IN</a>";
            }
        ?>
    </nav>
</header>
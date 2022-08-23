<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "fictionscore";

try {
    $connection = new PDO("mysql:host = $server; dbname = $database", $username, $password);
    $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Connection has failed: ".$error->getMessage());
}
?>
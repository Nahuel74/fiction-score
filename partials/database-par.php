<?php 
    $server = "localhost";
    $database = "fictionscore";

$connection = mysqli_connect($server, "root", "", $database);

if (!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php 
    $server = "localhost";
    $database = "fictionscore";
    $dbUsername = "root";
    $dbPassword = "";

$connection = mysqli_connect($server, $dbUsername , $dbPassword, $database);

if (!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

?>
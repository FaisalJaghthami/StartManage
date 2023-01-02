<?php
    $host = "localhost";
    $dbname = "project";
    $username = "root";
    $password = "";
    
    $conn = new mysqli('localhost', 'root', '', 'project');

    if($conn->connect_error){
        die("Connection error: " .$conn->connect_error);
    }
?>
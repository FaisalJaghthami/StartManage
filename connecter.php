<?php
    $host = "localhost";
    $dbname = "epiz_33317695_project";
    $username = "epiz_33317695";
    $password = "SrP0e1vISkSI";
    
    $conn = new mysqli('localhost', 'epiz_33317695', 'SrP0e1vISkSI', 'epiz_33317695_project');

    if(!$conn){
        echo: "Connection error: " .mysqli_connect_error();
    }
?>

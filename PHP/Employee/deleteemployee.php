<?php
    include "../../connecter.php";
    session_start();
    $table_id = $_GET['table_id'];

    $query = "DELETE FROM `employee` WHERE table_id = '$table_id'";
    $result = mysqli_query($conn, $query);                
    if($result){
        header("Location: ../../Employee.php");
    }    
?>
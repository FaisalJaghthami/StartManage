<?php
    include "../../connecter.php";
    session_start();
    $event_id = $_GET['event_id'];

    $query = "DELETE FROM `calendar` WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $query);                
    if($result){
        header("Location: ../../Calendar.php");
    }    
?>
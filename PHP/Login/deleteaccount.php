<?php
    include "../../connecter.php";
    session_start();
    $user_id = $_SESSION["user_id"];

    $query1 = "DELETE FROM `spending` WHERE user_id = '$user_id'";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "DELETE FROM `earning` WHERE user_id = '$user_id'";
    $result2 = mysqli_query($conn, $query2);

    $query3 = "DELETE FROM `employee` WHERE user_id = '$user_id'";
    $result3 = mysqli_query($conn, $query3);

    $query4 = "DELETE FROM `contracts` WHERE user_id = '$user_id'";
    $result4 = mysqli_query($conn, $query4);

    $query5 = "DELETE FROM `projects` WHERE user_id = '$user_id'";
    $result5 = mysqli_query($conn, $query5);

    $query6 = "DELETE FROM `calendar` WHERE user_id = '$user_id'";
    $result6 = mysqli_query($conn, $query6);

    $query = "DELETE FROM `login` WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);                
    if($result){
        session_destroy();
        header("Location: ../../index.php");
        exit;
    }    
?>     

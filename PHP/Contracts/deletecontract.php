<?php
    include "../../connecter.php";
    session_start();
    $contract_id = $_GET['contract_id'];

    $query = "DELETE FROM `contracts` WHERE contract_id = '$contract_id'";
    $result = mysqli_query($conn, $query);                
    if($result){
        header("Location: ../../Contract.php");
    }    
?>
<?php
    include "../../connecter.php";
    session_start();
    $project_id = $_GET['project_id'];

    $query = "DELETE FROM `projects` WHERE project_id = '$project_id'";
    $result = mysqli_query($conn, $query);                
    if($result){
        header("Location: ../../Project.php");
    }    
?>
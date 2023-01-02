<?php
    include "../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $contract_name = $_POST["contract_name"];
        $start_date = $_POST["start_date"];
        $finish_date = $_POST["finish_date"];
        $contract_value = $_POST["contract_value"];

        $user_id = $_SESSION["user_id"];
    
        $query = "INSERT INTO `contracts`(`contract_name`, `start_date`, `finish_date`, `contract_value`, `user_id`) 
            VALUES ('$contract_name','$start_date','$finish_date','$contract_value','$user_id')";
             
        $result = mysqli_query($conn, $query);        
        if($result){
            header("Location: ../../Contract.php");
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class="container">
        <br>
        <form action="" method="post">
            <div class="mb-3">
                <label for="contract_name" class="form-label">Contract Name</label>
                <input type="text" name="contract_name" class="form-control" id="exampleFormControlInput1" placeholder="Google Drive" pattern="[A-Za-z ]{1,25}" title="Contract name should only include letters and not exceed 25 characters" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="exampleFormControlInput1" required>
            </div>

            <div class="mb-3">
                <label for="finish_date" class="form-label">Finish Date</label>
                <input type="date" name="finish_date" class="form-control" id="exampleFormControlInput1" required>
            </div>

            <div class="mb-3">
                <label for="contract_value" class="form-label">Contract Value</label>
                <input type="number" name="contract_value" class="form-control" id="exampleFormControlInput1" placeholder="300 SR" required>
            </div>

            <div class="buttons">
                <button type="submit" name="submit" class="btn btn-success">Add a Contract</button>
                <a href="../../Contract.php">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </div>
        </form>
        <br>
    </div>
</body>
</html>
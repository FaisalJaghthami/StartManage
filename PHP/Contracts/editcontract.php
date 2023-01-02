<?php
    include "../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $contract_id = $_POST["contract_id"];
        $contract_name = $_POST["contract_name"];
        $start_date = $_POST["start_date"];
        $finish_date = $_POST["finish_date"];
        $contract_value = $_POST["contract_value"];

        $user_id = $_SESSION["user_id"];

        $query = "UPDATE contracts SET contract_name='$contract_name',
                start_date='$start_date', finish_date='$finish_date', 
                contract_value='$contract_value' WHERE contract_id = $contract_id";
             
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
    <title>Modify Contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class="container">
        <br>
        <?php
            if(isset($_GET['contract_id'])){
                $id = mysqli_real_escape_string($conn, $_GET['contract_id']);
                $sql = "SELECT * from contracts where contract_id = $id";
                $result = mysqli_query($conn , $sql);
                
                if(mysqli_num_rows($result) > 0){
                    $contract = mysqli_fetch_array($result);
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="contract_id" value="<?php echo $contract['contract_id'];?>">

                        <div class="mb-3">
                            <label for="contract_name" class="form-label">Contract Name</label>
                            <input type="text" name="contract_name" class="form-control" id="exampleFormControlInput1" Value="<?php echo $contract['contract_name'];?>" pattern="[A-Za-z ]{1,25}" title="Contract name should only include letters and not exceed 25 characters" required>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="exampleFormControlInput1" Value="<?php echo $contract['start_date'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="finish_date" class="form-label">Finish Date</label>
                            <input type="date" name="finish_date" class="form-control" id="exampleFormControlInput1" Value="<?php echo $contract['finish_date'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="contract_value" class="form-label">Contract Value</label>
                            <input type="number" name="contract_value" class="form-control" id="exampleFormControlInput1" Value="<?php echo $contract['contract_value'];?>" required>
                        </div>

                        <div class="buttons">
                            <button type="submit" name="submit" class="btn btn-success">Modify contract</button>
                            <a href="../../Contract.php">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                        </div>
                    </form>
                    <?php
                }
            }
        ?>
        <br>
    </div>
</body>
</html>
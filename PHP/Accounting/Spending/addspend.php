<?php
    include "../../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $January = $_POST['January'];
        $February = $_POST['February'];
        $March = $_POST['March'];
        $April = $_POST['April'];

        $May = $_POST['May'];
        $June = $_POST['June'];
        $July = $_POST['July'];
        $August = $_POST['August'];

        $September = $_POST['September'];
        $October = $_POST['October'];
        $November = $_POST['November'];
        $December = $_POST['December'];

        $user_id = $_SESSION["user_id"];
           
        $query = "UPDATE `spending` SET `January`='$January', `February`='$February', `March`='$March', `April`='$April',
         `May`='$May', `June`='$June', `July`='$July', `August`='$August', `September`='$September',
         `October`='$October', `November`='$November', `December`='$December' WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);        
        if($result){
            header("Location: ../../../Accounting.php");
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modify Spending</title>
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
            <?php
                if(isset($_GET['table_id'])){
                    $id = mysqli_real_escape_string($conn, $_GET['table_id']);
                    $sql = "SELECT * from spending where table_id = $id";
                    $result = mysqli_query($conn , $sql);
                    
                    if(mysqli_num_rows($result) > 0){
                        $spend = mysqli_fetch_array($result);
                        ?>
                        <div class="mb-3">
                            <label for="January" class="form-label">January</label>
                            <input type="number" name="January" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['January'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="February" class="form-label">February</label>
                            <input type="number" name="February" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['February'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="March" class="form-label">March</label>
                            <input type="number" name="March" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['March'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="April" class="form-label">April</label>
                            <input type="number" name="April" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['April'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="May" class="form-label">May</label>
                            <input type="number" name="May" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['May'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="June" class="form-label">June</label>
                            <input type="number" name="June" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['June'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="July" class="form-label">July</label>
                            <input type="number" name="July" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['July'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="August" class="form-label">August</label>
                            <input type="number" name="August" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['August'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="September" class="form-label">September</label>
                            <input type="number" name="September" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['September'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="October" class="form-label">October</label>
                            <input type="number" name="October" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['October'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="November" class="form-label">November</label>
                            <input type="number" name="November" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['November'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="December" class="form-label">December</label>
                            <input type="number" name="December" class="form-control" id="exampleFormControlInput1" placeholder="Enter the value, if empty enter 0" value="<?php echo $spend['December'];?>" required>
                        </div>

                        <div class="buttons">
                            <button type="submit" name="submit" class="btn btn-success">Modify Spending</button>
                            <a href="../../../Accounting.php">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                        </div>
                        <?php
                    }
                }
            ?>
        </form>
        <br>
    </div>
</body>
</html>
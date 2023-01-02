<?php
    include "../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $table_id = $_POST['table_id'];
        $emp_id = $_POST["emp_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $title = $_POST["title"];
        $email = $_POST["email"];
        $join_date = $_POST["join_date"];
        $salary = $_POST["salary"];
        
        $user_id = $_SESSION["user_id"];

        $query = "UPDATE employee SET emp_id='$emp_id', fname='$fname',
                    lname='$lname', title='$title', email='$email',
                    join_date='$join_date', salary='$salary' WHERE table_id = $table_id";
        $result = mysqli_query($conn, $query);                
        if($result){
            header("Location: ../../Employee.php");
        }               
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modify Employee</title>
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
            if(isset($_GET['emp_id'])){
                $id = mysqli_real_escape_string($conn, $_GET['emp_id']);
                $sql = "SELECT * from Employee where emp_id = $id";
                $result = mysqli_query($conn , $sql);
                
                if(mysqli_num_rows($result) > 0){
                    $employee = mysqli_fetch_array($result);
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="table_id" value="<?php echo $employee['table_id'];?>">
                        <div class="mb-3">
                            <label for="emp_id" class="form-label">ID</label>
                            <input type="number" name="emp_id" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['emp_id'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['fname'];?>" pattern="[A-Za-z ]{1,20}" title="First name should only include letters and not exceed 20 characters" required>
                        </div>

                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['lname'];?>" pattern="[A-Za-z ]{1,20}" title="Last name should only include letters and not exceed 20 characters" required>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Position</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['title'];?>" pattern="[A-Za-z ]{1,20}" title="Position should only include letters and not exceed 30 characters" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['email'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="join_date" class="form-label">Joined Since</label>
                            <input type="date" name="join_date" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['join_date'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" value="<?php echo $employee['salary'];?>" required>
                        </div>

                        <div class="buttons">
                            <button type="submit" name="submit" class="btn btn-success">Modify employee</button>
                            <a href="../../Employee.php">
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
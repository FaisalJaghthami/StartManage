<?php
    include "../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $project_id = $_POST["project_id"];
        $project_name = $_POST["project_name"];
        $assigned_to = $_POST["assigned_to"];
        $emp = "";
        foreach($assigned_to as $assigned){
            $emp .= $assigned . "\n";
        }
        $start_date = $_POST["start_date"];
        $finish_date = $_POST["finish_date"];
        $project_status = $_POST["project_status"];

        $user_id = $_SESSION["user_id"];
    
        $query = "UPDATE `projects` SET `project_name`='$project_name',`assigned_to`='$emp',
        `start_date`='$start_date',`finish_date`='$finish_date',`project_status`='$project_status',
        `user_id`='$user_id' WHERE project_id = $project_id";
        $result = mysqli_query($conn, $query);        
        if($result){
            header("Location: ../../Project.php");
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modify Project</title>
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
            if(isset($_GET['project_id'])){
                $id = mysqli_real_escape_string($conn, $_GET['project_id']);
                $sql = "SELECT * from Projects where project_id = $id";
                $result = mysqli_query($conn , $sql);
                
                if(mysqli_num_rows($result) > 0){
                    $project = mysqli_fetch_array($result);
                    ?>
                    <form action="" method="post">
                    <input type="hidden" name="project_id" value="<?php echo $project['project_id'];?>">
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" name="project_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $project['project_name'];?>" pattern="[A-Za-z ]{1,100}" title="Project name should only include letters and not exceed 100 characters" required>
                        </div>

                        <div class="mb-3">
                            <label for="assigned_to" class="form-label">Assigned To</label>
                            <?php
                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT fname, lname, title from Employee where user_id = $user_id";
                            $result = mysqli_query($conn , $sql);
                            $emp = mysqli_fetch_assoc($result);
                            $emp = mysqli_query($conn , $sql);

                            if(mysqli_num_rows($emp) > 0){
                                foreach($emp as $employee){
                                ?>
                                <div class="form-check">
                                    <!--show input and make it required-->
                                    <input type="checkbox" name="assigned_to[]" 
                                    value="<?php echo $employee["fname"]; echo " ";
                                            echo $employee["lname"]; echo " (";
                                            echo $employee["title"]; echo ")";?>">

                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?php echo $employee["fname"]; ?><?php echo " " ?>
                                        <?php echo $employee["lname"]; ?> <?php echo " " ?>
                                        (<?php echo $employee["title"]; ?>)
                                    </label>
                                </div>
                                <?php echo "\n";?>
                                <?php
                                }
                            }
                        ?>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="exampleFormControlInput1" value="<?php echo $project['start_date'];?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="finish_date" class="form-label">Finish Date</label>
                            <input type="date" name="finish_date" class="form-control" id="exampleFormControlInput1" value="<?php echo $project['finish_date'];?>" required>
                        </div>

                        <label>Project Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="project_status" value="ongoing" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="project_status">Ongoing</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="project_status" value="completed" id="flexRadioDefault2">
                            <label class="form-check-label" for="project_status">Completed</label>
                        </div>
                        <br>
                        <div class="buttons">
                            <button type="submit" name="submit" class="btn btn-success">Modify project</button>
                            <a href="../../Project.php">
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
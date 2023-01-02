<?php
    include "../../connecter.php";
    session_start();

    if(isset($_POST['submit'])){
        $event_name = $_POST["event_name"];
        $event_date = $_POST["event_date"];
        $event_time = $_POST["event_time"];
        
        $user_id = $_SESSION["user_id"];
    
        $query = "INSERT INTO `calendar`(`event_name`, `event_date`, `event_time`, `user_id`)
             VALUES ('$event_name','$event_date','$event_time','$user_id')";
        $result = mysqli_query($conn, $query);        
        if($result){
            header("Location: ../../Calendar.php");
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add an Evnet</title>
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
                <label for="event_name" class="form-label">Event Name</label>
                <input type="text" name="event_name" class="form-control" id="exampleFormControlInput1" placeholder="Meeting with Client" pattern="[A-Za-z ]{1,70}" title="Event name should only include letters and not exceed 70 characters" required>
            </div>

            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" name="event_date" class="form-control" id="exampleFormControlInput1" required>
            </div>

            <div class="mb-3">
                <label for="event_time" class="form-label">Event Time</label>
                <input type="time" name="event_time" class="form-control" id="exampleFormControlInput1" required>
            </div>

            <div class="buttons">
                <button type="submit" name="submit" class="btn btn-success">Add an Event</button>
                <a href="../../Calendar.php">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </div>
        </form>
        <br>
    </div>
</body>
</html>
<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (empty($_POST["Fname"])) {
            die("First Name is required");
        }
    
        if (empty($_POST["Lname"])) {
            die("Last Name is required");
        }
    
        if (empty($_POST["Cname"])) {
            die("Company Name is required");
        }
        
        if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("Valid email is required");
        }
        
        if (strlen($_POST["password"]) < 8) {
            die("Password must be at least 8 characters");
        }
        
        if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
            die("Password must contain at least one letter");
        }
        
        if ( ! preg_match("/[0-9]/", $_POST["password"])) {
            die("Password must contain at least one number");
        }
        
        if ($_POST["password"] !== $_POST["password_confirmation"]) {
            die("Passwords must match");
        }

        $mysqli = require __DIR__ . "/connecter.php";

        $fname = $_POST["Fname"];
        $lname = $_POST["Lname"];
        $cname = $_POST["Cname"];
        $email = $_POST["email"];
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO `Login`(`email`, `fname`, `lname`, `cname`, `pass`)
                VALUES ('$email','$fname','$lname','$cname','$pass')";
                
        $result = mysqli_query($conn, $sql);
                        
        if ($result){
            header("Location: index.php");
            exit;
        }
        else{
            die("Email already taken, Please Login");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/OriginalStyle.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }
        .register-btns a{
            text-decoration: none;
        }
        .register-btns a div{
            margin-top: 0.5em;
        }
        .error{
            color: red;
        }
    </style>
<body>
    <div class="register">
        <form action="" method="post">
            <h5>Create an Account</h5>
            <div class="mb-3">
                <label for="Fname" class="form-label">First Name</label>
                <input type="text" name="Fname" class="form-control" id="Fname" aria-describedby="emailHelp" pattern="[A-Za-z ]{1,25}" title="First name should only include letters and not exceed 25 characters" required>
                <p class = "error" id = "fname_error"></p>
            </div>
            <div class="mb-3">
                <label for="Lname" class="form-label">Last Name</label>
                <input type="text" name="Lname" class="form-control" id="Lname" aria-describedby="emailHelp" pattern="[A-Za-z ]{1,25}" title="Last name should only include letters and not exceed 25 characters" required>
                <p class = "error" id = "lname_error"></p>
            </div>
            <div class="mb-3">
                <label for="Cname" class="form-label">Company Name</label>
                <input type="text" name="Cname" class="form-control" id="Cname" aria-describedby="emailHelp" pattern="[A-Za-z ]{1,70}" title="Company name should only include letters and not exceed 70 characters"required>
                <p class = "error" id = "cname_error"></p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                <p class = "error" id = "email_error"></p>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" 
                            title="Password must include 
                            &#010;• At least 1 Uppercase
                            &#010;• At least 1 Lowercase
                            &#010;• At least 1 Number
                            &#010;• At least 1 Symbol !@#$%^&*_=+-
                            &#010;• Min 9 characters and Max 20 characters" required>
                <p class = "error" id = "pass_error"></p>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" title="Must match the new password." required>
            </div>
            <div class="register-btns">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <a href="index.php">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
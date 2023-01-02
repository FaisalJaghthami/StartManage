<?php

    $is_invalid = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        include "connecter.php";
    
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $sql = "SELECT * from `login` where email='$email'";
        $result = mysqli_query($conn , $sql);
        
        if(mysqli_num_rows($result) > 0){

            $query = "SELECT * FROM `login` WHERE email = '$email'";
            $result1 = mysqli_query($conn , $query);
            $user = mysqli_fetch_assoc($result1);

            if(password_verify($pass ,$user['pass'])){
                $_SESSION["user_id"]= $user["id"];
                header("location: dashboard.php");
            }
            else{
                $is_invalid = false;
            }
        }
        else{
            $is_invalid = false;
        }
        $is_invalid = true;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start Manage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<style>
    body{
        width: 100vw;
        height: 100vh;
    }
    .container.text-center{
        margin: 0;
        padding: 0;
        width: 100vw;
    }
    .row{
        width: 100vw;
        height: 100vh;
    }
    .col{
        width: 100%;
        margin: 0;
        padding: 0;
    }
    #left{
        height: 100vh;
        background-image: url(Images/left-side.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    #right{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #eee;
    }
    .signin{
        background-color: white;
        padding: 2em;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: auto;
        height: auto;
        text-align: left;
    }
    .error{
        color: red;
        max-width: 270px;
    }
</style>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col" id="left"></div>
            <div class="col" id="right">
                <div class="signin">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                            <?php if($is_invalid):?>
                                <p class="error" id="email_error">These credentials do not match our records.</p>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <a href="Password-Reset.php">Forgot Password?</a>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <br>
                        <p>Don't Have an Account?
                            <a href="Register-Page.php">Register Here</a>
                        </p>
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
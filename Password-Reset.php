<?php
    $is_invalid = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include "connecter.php";

        $email = $_POST["email"];

        $sql = "SELECT * from `login` where email='$email'";
        $result = mysqli_query($conn , $sql);
        
        if(mysqli_num_rows($result) > 0){
            //update table, send email, show success msg and redirect to index.php
        }
        else{
            $is_invalid = false;
        }
        $is_invalid = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset Password</title>
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
        .reset-btns a{
            text-decoration: none;
        }
        .reset-btns a div{
            margin-top: 0.5em;
        }
        p{
            max-width: 450px;
        }
        .error{
            color: red;
        }
    </style>
<body>
    <div class="reset">
        <form action="" method="post">
            <h3>Reset your Password</h3>
            <p></p>
            <p>We will send you an email with a password that you can use to login with. <br>And we suggest that you change it from the seetings once you login.</p>
            <br>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                <?php if($is_invalid):?>
                    <p class="error" id="email_error">Invalid email address.</p>
                <?php endif;?>
            </div>
            <div class="reset-btns">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Send me an Email</button>
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
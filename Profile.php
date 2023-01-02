<?php
    include "connecter.php";
    session_start();

    if(!isset($_SESSION['user_id'])): 
        header("Location: index.php");
    endif;

    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_confirmation = $_POST["password_confirmation"];
        $user_id = $_SESSION["user_id"];

        if($password === $password_confirmation){

            $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $query = "UPDATE `login` SET `pass`='$new_password' WHERE id = $user_id";
            $result = mysqli_query($conn, $query);        
            header("Location: Dashboard.php");
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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/b0093c5e1c.js" crossorigin="anonymous"></script>
</head>
<style>
    .col-sm-10{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column;
    }
    .mid{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 80%;
    }
    form{
        width: 100%;
    }
    .form-title{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
    }
    .bot{
        width: 100%;
    }
    .bot h5{
        text-align: start;
    }
    .bot a{
        text-decoration: none;
        width: 100%;
    }
    .bot button{
        width: 100%;
    }
</style>
<body>
    <div class="container-fluid">
        <!-- *******************************/start of side menu/****************************** -->
        <div class="row">
            <div class="col-sm-2 sidenav">
                <h3>SM System</h3>
                <div class="side-menu">
                    <ul>
                        <a href="Dashboard.php">
                            <li>Dashboard</li>
                        </a>
                        <a href="Employee.php">
                            <li>Employees</li>
                        </a>
                        <a href="Contract.php">
                            <li>Contracts</li>
                        </a>
                        <a href="Accounting.php">
                            <li>Spending & Earnings</li>
                        </a>
                        <a href="Project.php">
                            <li>Projects</li>
                        </a>
                        <a href="Calendar.php">
                            <li>Calendar</li>
                        </a>
                    </ul>
                </div>
                <div class="user">
                    <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT cname FROM `login` WHERE id = $user_id";
                        $result = mysqli_query($conn , $sql);
                        $user = mysqli_fetch_assoc($result);
                        echo $user['cname'];
                    ?>
                    <a href="PHP/Login/logout.php">
                        <div class="logout">
                            <span class="material-symbols-outlined">logout</span>
                            <h5>Logout</h5>
                        </div>
                    </a>
                </div>
            </div>
        <!-- *******************************/End of side menu/****************************** -->
        <!-- *******************************/start of header/******************************* -->
        <div class="col-sm-10">
            <div class="header">
                <div class="empty">
                    <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT fname FROM `login` WHERE id = $user_id";
                        $result = mysqli_query($conn , $sql);
                        $user = mysqli_fetch_assoc($result);
                        echo "Welcome ";
                        echo $user['fname'];
                    ?>
                </div>
                <div class="date">
                    <span id="date"></span>
                </div>
                <div class="icon">
                    <a href="Profile.php">
                        <i class="fa-solid fa-gear fs-5 me-3"></i>
                    </a>
                </div>
            </div>
<!--***********************************************************************************-->
            <div class="mid">
                <form action="" method="post">
                    <h5>Change your password</h5>
                    <br>
                    <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT email from login where id = $user_id";
                        $result = mysqli_query($conn , $sql);
                        $user = mysqli_fetch_assoc($result);
                    ?>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $user['email']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" 
                            title="Password must include 
                            &#010;• At least 1 Uppercase
                            &#010;• At least 1 Lowercase
                            &#010;• At least 1 Number
                            &#010;• At least 1 Symbol !@#$%^&*_=+-
                            &#010;• Min 9 characters and Max 20 characters" required>
                            
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$" title="Must match the new password." required>
                        </div>
                        <?php if($is_invalid):?>
                            <p class="error" id="email_error">These credentials do not match our records.</p>
                        <?php endif;?>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-success">Change my password</button>
                    </div>
                </form>

                <br>
                <br>
                <div class="form-title">
                    <h5>Delete your account</h5>
                </div>
                <br>
                <div class="bot">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete">Delete My Account</button>
                </div>


                <!--Modal: modalConfirmDelete-->
                <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading">Delete your</p>
                            </div>

                            <!--Body-->
                            <div class="modal-body d-flex justify-content-start">
                                <span>
                                    Note: this will delete all of your data including your account information, and you will not be able to retrieve them again.
                                    <br>
                                    Proceed anyway?
                        </span>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center d-flex justify-content-center">
                                <a href="PHP/Login/deleteaccount.php" class="btn btn-danger waves-effect">Yes</a>
                                <a type="button" class="btn btn-outline-danger" data-dismiss="modal">No</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: modalConfirmDelete-->


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="JS/date.js"></script>
</body>
</html>
<?php
    include "connecter.php";
    session_start();

    if(!isset($_SESSION['user_id'])): 
        header("Location: index.php");
    endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/b0093c5e1c.js" crossorigin="anonymous"></script>
</head>

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
            <h5>Employees</h5>
            <a href="PHP/Employee/addemployee.php">
                <button type="button" class="btn btn-primary">Add an Employee</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined Since</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT * from Employee where user_id = $user_id";
                            $result = mysqli_query($conn , $sql);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $employee){
                                    ?>
                                    <td><?php echo $employee['emp_id']?></td>
                                    <td><?php echo $employee['fname']?></td>
                                    <td><?php echo $employee['lname']?></td>
                                    <td><?php echo $employee['title']?></td>
                                    <td><?php echo $employee['email']?></td>
                                    <td><?php echo $employee['join_date']?></td>
                                    <td><?php echo $employee['salary']; echo " SR";?></td>
                                    <td>
                                        <div class="edit-delete">
                                            <a href="PHP/Employee/editemployee.php?emp_id=<?php echo $employee['emp_id'];?>">
                                                <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
                                            </a>
                                            <a href="PHP/Employee/deleteemployee.php?table_id=<?php echo $employee['table_id']?>">
                                                <i class="fa-solid fa-trash fs-5 me-3"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <?php echo "</tr>\n";?>
                                    <?php
                                }
                            }
                            else{
                                echo '<td colspan="8" style="text-align:center;">No Records Found</td>';
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="JS/date.js"></script>
</body>
</html>
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
    <title>Spending & Earnings</title>
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
            <!--********************************************************************************************-->     
            <?php
                $user_id = $_SESSION["user_id"];
                $sql = "SELECT * FROM `spending` WHERE user_id = $user_id";
                $result = mysqli_query($conn , $sql);
                        
                if(mysqli_num_rows($result)>0){
                    $spend = mysqli_fetch_array($result);
                    $spend['January'];
                    $spend['February'];
                    $spend['March'];
                    $spend['April'];
                        
                    $spend['May'];
                    $spend['June'];
                    $spend['July'];
                    $spend['August'];

                    $spend['September'];
                    $spend['October'];
                    $spend['November'];
                    $spend['December'];
                }
                else{
                    $query = "INSERT INTO `spending`(`January`, `February`, `March`, `April`, `May`, 
                        `June`, `July`, `August`, `September`, `October`, `November`, `December`, `user_id`)
                    VALUES ('0','0','0','0','0','0','0',
                        '0','0','0','0','0','$user_id')";
                    $result = mysqli_query($conn, $query);
                    $spend['January'] = 0;
                    $spend['February'] = 0;
                    $spend['March'] = 0;
                    $spend['April'] = 0;
                        
                    $spend['May'] = 0;
                    $spend['June'] = 0;
                    $spend['July'] = 0;
                    $spend['August'] = 0;
                        
                    $spend['September'] = 0;
                    $spend['October'] = 0;
                    $spend['November'] = 0;
                    $spend['December'] = 0;
                }
            ?>
            <input type='hidden' id='January' value="<?php echo $spend['January'];?>">
            <input type='hidden' id='February' value="<?php echo $spend['February'];?>">
            <input type='hidden' id='March' value="<?php echo $spend['March'];?>">
            <input type='hidden' id='April' value="<?php echo $spend['April'];?>">

            <input type='hidden' id='May' value="<?php echo $spend['May'];?>">
            <input type='hidden' id='June' value="<?php echo $spend['June'];?>">
            <input type='hidden' id='July' value="<?php echo $spend['July'];?>">
            <input type='hidden' id='August' value="<?php echo $spend['August'];?>">

            <input type='hidden' id='September' value="<?php echo $spend['September'];?>">
            <input type='hidden' id='October' value="<?php echo $spend['October'];?>">
            <input type='hidden' id='November' value="<?php echo $spend['November'];?>">
            <input type='hidden' id='December' value="<?php echo $spend['December'];?>">      

            <div class="chart-container">
                <div class="top-container-b">
                    <div class="text">
                        <h5>Spending</h5>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT * from spending where user_id = $user_id";
                            $result = mysqli_query($conn , $sql);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $spend){
                                    ?>
                                <a href="PHP/Accounting/Spending/addspend.php?table_id=<?php echo $spend['table_id'];?>">
                                    <button type="button" class="btn btn-primary">Modify Spending</button>
                                </a>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="top-container-chart">
                        <div>
                            <canvas id="myChart" style="height:35vh; width:77vw"></canvas>
                        </div>
                    </div>
                </div>

                <?php
                    $user_id = $_SESSION["user_id"];
                    $sql = "SELECT * FROM `earning` WHERE user_id = $user_id";
                    $result = mysqli_query($conn , $sql);
                            
                    if(mysqli_num_rows($result)>0){
                        $earn = mysqli_fetch_array($result);
                        $earn['January'];
                        $earn['February'];
                        $earn['March'];
                        $earn['April'];
                            
                        $earn['May'];
                        $earn['June'];
                        $earn['July'];
                        $earn['August'];

                        $earn['September'];
                        $earn['October'];
                        $earn['November'];
                        $earn['December'];
                    }
                    else{
                        $query = "INSERT INTO `earning`(`January`, `February`, `March`, `April`, `May`, 
                            `June`, `July`, `August`, `September`, `October`, `November`, `December`, `user_id`)
                        VALUES ('0','0','0','0','0','0','0',
                            '0','0','0','0','0','$user_id')";
                        $result = mysqli_query($conn, $query);
                        $earn['January'] = 0;
                        $earn['February'] = 0;
                        $earn['March'] = 0;
                        $earn['April'] = 0;
                            
                        $earn['May'] = 0;
                        $earn['June'] = 0;
                        $earn['July'] = 0;
                        $earn['August'] = 0;
                            
                        $earn['September'] = 0;
                        $earn['October'] = 0;
                        $earn['November'] = 0;
                        $earn['December'] = 0;
                    }
                ?>
                <input type='hidden' id='January1' value="<?php echo $earn['January'];?>">
                <input type='hidden' id='February1' value="<?php echo $earn['February'];?>">
                <input type='hidden' id='March1' value="<?php echo $earn['March'];?>">
                <input type='hidden' id='April1' value="<?php echo $earn['April'];?>">

                <input type='hidden' id='May1' value="<?php echo $earn['May'];?>">
                <input type='hidden' id='June1' value="<?php echo $earn['June'];?>">
                <input type='hidden' id='July1' value="<?php echo $earn['July'];?>">
                <input type='hidden' id='August1' value="<?php echo $earn['August'];?>">

                <input type='hidden' id='September1' value="<?php echo $earn['September'];?>">
                <input type='hidden' id='October1' value="<?php echo $earn['October'];?>">
                <input type='hidden' id='November1' value="<?php echo $earn['November'];?>">
                <input type='hidden' id='December1' value="<?php echo $earn['December'];?>">
                <div class="bottom-container">
                    <div class="text">
                        <h5>Earnings</h5>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT * from earning where user_id = $user_id";
                            $result = mysqli_query($conn , $sql);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $earn){
                                    ?>
                                <a href="PHP/Accounting/Earning/addearn.php?table_id=<?php echo $earn['table_id'];?>">
                                    <button type="button" class="btn btn-primary">Modify Earnings</button>
                                </a>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="bottom-container-chart"></div>
                        <div>
                            <canvas id="myChart1" style="height:35vh; width:77vw"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="JS/accounting.js"></script>
    <script src="JS/date.js"></script>
</body>
</html>
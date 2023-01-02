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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/OriginalStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/b0093c5e1c.js" crossorigin="anonymous"></script>
</head>
<style>
    #employee{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(Images/employee.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    }
    #employee:hover{
        background: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)), url(Images/employee.jpg);
        transition: 5s ease-in-out;
    }
    #contracts{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(Images/contract.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    #contracts:hover{
        background: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)), url(Images/employee.jpg);
        transition: 5s ease-in-out;
    }
    #projects{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(Images/project.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    #projects:hover{
        background: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)), url(Images/project.jpg);
        transition: 5s ease-in-out;
    }
    #calendar{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(Images/time.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    #calendar:hover{
        background: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1)), url(Images/time.jpg);
        transition: 5s ease-in-out;
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
            <div class="top-container">
                <a href="Employee.php">
                    <div class="card" id="employee">
                        <span>Employees</span>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT COUNT(*) as count FROM employee where user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $rowcount = mysqli_fetch_assoc($result);
                            $output = $rowcount['count'];
                            
                            if($output > 0){
                                echo $output;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                    </div>
                </a>
                <a href="Contract.php">
                    <div class="card" id="contracts">
                        <span>Contracts</span>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT COUNT(*) as count FROM contracts where user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $rowcount = mysqli_fetch_assoc($result);
                            $output = $rowcount['count'];
                            
                            if($output > 0){
                                echo $output;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                    </div>
                </a>
                <a href="Project.php">
                    <div class="card" id="projects">
                        <span>Projects</span>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT COUNT(*) as count FROM projects where user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $rowcount = mysqli_fetch_assoc($result);
                            $output = $rowcount['count'];
                            
                            if($output > 0){
                                echo $output;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                    </div>
                </a>
                <a href="Calendar.php">
                    <div class="card" id="calendar">
                        <span>Events</span>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT COUNT(*) as count FROM calendar where user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $rowcount = mysqli_fetch_assoc($result);
                            $output = $rowcount['count'];
                            
                            if($output > 0){
                                echo $output;
                            }
                            else{
                                echo 0;
                            }
                        ?>
                    </div>
                </a>
            </div>

            <div class="row align-items-start" style="margin-top: 1em;">
                <div class="col-6">
                    <div>
                        <div class="project-chart">
                            <canvas id="projectChart"></canvas>
                        </div>
                        <?php
                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT * from projects where user_id = $user_id";
                            $result = mysqli_query($conn , $sql);

                            $ongoing = 0;
                            $com = 0;
                            $not_com = 0;
                            if(mysqli_num_rows($result) > 0){
                                
                                foreach($result as $project){

                                    $finish = $project['finish_date'];
                                    $current = date('Y-m-d');
                                       

                                    if($project['project_status'] == "ongoing"){
                                        if($current < $finish){
                                            $ongoing++;
                                        }
                                        else{
                                            $not_com++;
                                        }
                                    }
                                    else{
                                        $com++;
                                    }
                                }
                            }
                            else{
                                $ongoing = 0;
                                $com = 0;
                                $not_com = 0;
                            }
                        ?>
                        
                        <input type='hidden' id="count_notCom" value="<?php echo $not_com;?>">
                        <input type='hidden' id="countCom" value="<?php echo $com;?>">
                        <input type='hidden' id="count_ongoing" value="<?php echo $ongoing;?>">
                    </div>
                </div>
                <div class="col">
                    <h6 style="text-align:center;">Upcoming Events</h6>
                    <table class="table" style="margin-top: 0;">
                        <thead>
                            <tr>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Event Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php    
                                    $current = date('Y-m-d');
                                    $query = "SELECT * FROM calendar where user_id = '$user_id' && event_date > '$current'";
                                    $result = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($result) == 0){                           
                                        echo '<td colspan="3" style="text-align:center;">No Upcoming Events</td>';
                                    }
                                    else{
                                        $sql = "SELECT * from Calendar where user_id = '$user_id' && event_date > '$current'";
                                        $result = mysqli_query($conn , $sql);

                                        //$finish = $event['event_date'];
                                                
                                        if(mysqli_num_rows($result) > 0){
                                            foreach($result as $event){
                                            ?>
                                                <td><?php echo $event['event_name']?></td>
                                                <td><?php echo $event['event_date']?></td>
                                                <td><?php echo $event['event_time']?></td>
                                            <?php 
                                                    echo "</tr>";
                                                    echo "\n";
                                            }
                                        }
                                        else{
                                            echo '<td colspan="3" style="text-align:center;">No</td>';
                                        }
                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="JS/date.js"></script>
    <script>

        // setup block 
        const labels = [
            'Not-completed',
            'Completed',
            'Ongoing'
        ];

        //Project chart
        
        var count_notCom = document.getElementById("count_notCom").value;
        var countCom = document.getElementById("countCom").value;
        var count_ongoing = document.getElementById("count_ongoing").value;

        const data = {
            labels: labels,
            datasets: [{
                label: 'Projects',
                backgroundColor: [
                    'red',
                    'green',
                    'yellow'
                ],
                data: [count_notCom,countCom,count_ongoing],
            }]
        };
        //config block 
        const config = {
            type: 'pie',
            data: data,
            
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Projects Status'
                    }
                }
            }
        };
        //render block
        const projectChart = new Chart(
            document.getElementById('projectChart'),
            config
        );
    </script>
</body>
</html>
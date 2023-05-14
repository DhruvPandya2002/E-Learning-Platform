<?php
// include('userStatus.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}
?>
<?php
$con = new mysqli('localhost', 'root', '', 'devtown');

if (!$con)
    die(mysqli_error($con));

$_SESSION['UserID'] = $_GET['activity'];

if (!isset($_SESSION['UserID'])) {
    header('location:User.php');
}

$myid = $_SESSION['UserID'];
$sql_display = "SELECT * FROM `users` WHERE `user_id` = '$myid'";
$result = mysqli_query($con, $sql_display);
$result_name = mysqli_query($con, $sql_display);
$row = mysqli_fetch_array($result_name);
$user_name_new = $row['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
    <title>DevTown-Admin</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTable Style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- ajax cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- sweet alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- chart js cdn  -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .swal-modal {
            padding: 30px;
        }

        .panel-body {
            margin-top: 20px;
            margin-left: 20px;
            height: auto;
            width: auto !important;
            border-radius: 30px;
        }

        .row {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
            height: auto;
            width: auto;
        }

        #graph {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            margin-left: 80px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="Logo\Circle_1980x1980.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DevTown</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel(optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-3" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['admin']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar placeholder:text-white" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="dashbord.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Admin.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="User.php" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Blog.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Blog
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Course.php" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Course
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Course_content.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Course Content
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="comment.php" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Comment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="comment.php" class="nav-link">
                                <i class="fa-sharp fa-solid fa-comments"></i>
                                <p>
                                    Comment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment_details.php" class="nav-link">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p>
                                    courses purchased
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="premium_course.php" class="nav-link">
                                <i class="fa-solid fa-gem"></i>
                                <p>
                                    premium
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="premium_content.php" class="nav-link">
                                <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                                <p>
                                    premium course
                                </p>
                            </a>
                        </li>
                        <li class="nav-item fixed-bottom">
                            <a href="logout.php" class="nav-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <p>
                                    LogOut
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content background:url('https://bootdey.com/img/Content/bg1.jpg')-->
        <div class="content-wrapper">
            <!-- user template -->
            <div id="main_div">
                <div class="col-md-4">
                    <!-- START widget-->
                    <div class="panel widget">
                        <div style="background-image: linear-gradient(to bottom right,#9600FF,#AEBAF8);" class="panel-body text-center bg-center">
                            <div class="row row-table">
                                <div class="col-xs-12 text-white text-center center-block">
                                    <img src="Logo\user_image.png" alt="Image" class="img-thumbnail img-circle thumb128 ">
                                    <?php
                                    $user_id = $_GET['activity'];
                                    $user_name = "SELECT * FROM `users` WHERE `user_id` ='$user_id'";
                                    $result = mysqli_query($con, $user_name);
                                    if (mysqli_num_rows($result)) {
                                        $row = mysqli_fetch_array($result);
                                    ?>
                                        <h3 class="m0"><?php echo $row['name']; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END widget-->
                </div>
                <!-- user template -->
                <div class="card" style="width: 18rem; border-radius: 10px; margin-left: 20px; margin-top: 20px;">
                    <div class="card-header" style="background-color:cadetblue;">
                        User Status
                    </div>
                    <?php
                                        $class = "red";
                                        $status = "offine";
                                        if ($row['user_status'] == 1) {
                                            $class = "Black";
                                            $status = "online";
                                        }
                    ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" height="300px" width="400px" style="background-color:aliceblue;color:<?php echo $class; ?>;">
                        <?php echo $status;
                                    }  ?>
                        </li>
                        <li>
                            <!-- <p><?php echo $user_id; ?></p> -->
                        </li>
                    </ul>
                </div>
            </div>
            <?php include('range.php') ?>
            <div id="graph">
                <?php

                $user = $user_name_new;
                $startDate = "2023-04-18";
                $today = date("Y-m-d");

                // Fetch the data from the table
                $sql = "SELECT `login`, `logout`, `date`, `difference` FROM `user_status` WHERE `user_name`='$user' AND `date` BETWEEN '$startDate' AND '$today'";

                $result = mysqli_query($con, $sql);

                // Calculate the active time for each day
                $data = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $date = $row["date"];
                    $active_time =  $row['difference'];

                    if (!isset($data[$date])) {
                        $data[$date] = $active_time;
                    } else {
                        $data[$date] += $active_time;
                    }
                }
                ?>
                <div>
                    <canvas id="line" height="500" width="1000" aria-label="chart" role="img"></canvas>
                </div>
                <script>
                    var data = {
                        labels: <?php echo json_encode(array_keys($data)); ?>,
                        datasets: [{
                            label: 'Active Time',
                            data: <?php echo json_encode(array_values($data)); ?>,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    };

                    var options = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var ctx = document.getElementById('line').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: data,
                        options: options
                    });
                </script>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class=" main-footer">
            <strong>Copyright &copy; 2022-2023 <a href="#">DevTown</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                
        </footer>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script>
        function userStatus() {
            $.ajax({
                url: 'userStatus.php',
                success: function(result) {
                    jQuery('#main_div').html(result);
                }
            });
        }

        setInterval(function() {
            userStatus();
        }, 5000);
    </script>
</body>

</html>
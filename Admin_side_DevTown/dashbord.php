<?php

session_start();

if (!isset($_SESSION['admin'])) {
  header('location:index.php');
}

$con = new mysqli('localhost', 'root', '', 'devtown');

if (!$con)
  die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DevTown-Dashbord</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    #graph {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px;
      margin-left: 80px;
    }

    #slides {
      display: flex;
      justify-content: center;
      align-items: baseline;
      margin: 70px;
    }
  </style>
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item mx-2">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link">Dashboard</a>
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
              <a href="dashbord.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Admin.php" class="nav-link ">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="User.php" class="nav-link">
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

    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content-wrapper">
      <section class="content" id="slides">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-building-columns"></i></span>
                <?php
                $query = "SELECT COUNT(`course_name`) AS `total` FROM `premium`";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                  $row = mysqli_fetch_array($result);
                ?>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Premium Courses</span>
                    <span class="info-box-number"><?php echo $row['total']; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                <?php
                }
                ?>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <?php
                $query = "SELECT COUNT(`name`) AS `active` FROM `users`";
                // foreach ($query as $data) {
                //   $active = $data['active'];
                // }
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                  $row = mysqli_fetch_array($result);
                ?>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number"><?php echo $row['active']; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                <?php
                }
                ?>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <?php
                $query = "SELECT COUNT(`transaction_id`) AS `sales` FROM `tbl_payment` WHERE `payment_status`='complete'";
                // foreach ($query as $data) {
                //   $active = $data['active'];
                // }
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                  $row = mysqli_fetch_array($result);
                ?>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Sales</span>
                    <span class="info-box-number"><?php echo $row['sales']; ?></span>
                  </div>
                  <!-- /.info-box-content -->
                <?php
                }
                ?>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
				<?php
                $query = "SELECT COUNT(`name`) AS `member` FROM `users` WHERE `date`=CURDATE();";                
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                 $row = mysqli_fetch_array($result);
                ?>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number"><?php echo $row['member']; ?></span>
                </div>
				<?php
                }
                ?>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </div>
        <!-- /.row -->

      </section>
      <div id="graph">
        <div>
          <canvas id="line" aria-label="chart" role="img" height="500" width="700" style="background-color:white"></canvas>
        </div>
        <br>
        <br>
        <br>
        <div>
          <canvas id="myChart" aria-label="chart" role="img" height="500" width="300"></canvas>
        </div>
      </div>
      <?php
      $query = $con->query("SELECT `country`, COUNT(*) AS `people` FROM `users` GROUP BY `country`");
      foreach ($query as $data) {
        $country[] = $data['country'];
        $people[] = $data['people'];
      }
      ?>
      <script>
        const labels = <?php echo json_encode($country) ?>;
        const ctx = document.getElementById('myChart').getContext("2d");
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: labels,
            datasets: [{
              data: <?php echo json_encode($people) ?>,
              backgroundColor: [
                'rgb(155, 93, 229)',
                'rgb(241, 91, 181)',
                'rgb(254, 228, 64)',
                'rgb(0, 187, 249)',
                'rgb(0, 245, 212)',
              ],
            }, ],
          },
          options: {
            responsive: false,
            layout: {
              padding: {
                bottom: "20",
              },
            },
            plugins: {
              title: {
                display: true,
                text: 'Country from where Users are',
              },
            },
          },
        });
      </script>
      <?php
      $product = $con->query("SELECT `product_name`, COUNT(*) AS `num_purchases` FROM `tbl_payment` WHERE `payment_status`='complete' GROUP BY `product_name` ORDER BY `num_purchases`");
      foreach ($product as $data) {
        $num_purchases[] = $data['num_purchases'];
        $product_name[] = $data['product_name'];
      }
      ?>
      <script>
        var ctx1 = document.getElementById('line').getContext('2d');
        var chart = new Chart(ctx1, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($product_name); ?>,
            datasets: [{
              label: 'Course Purchase',
              data: <?php echo json_encode($num_purchases); ?>,
              backgroundColor: ['rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: ['rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap -->
    <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- overlayScrollbars -->
    <!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.js"></script> -->

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <!-- <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- pie chart data -->
</body>

</html>
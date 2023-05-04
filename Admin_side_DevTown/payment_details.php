<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('location:index.php');
}

?>
<?php
$con = new mysqli('localhost', 'root', '', 'devtown');

if (!$con)
  die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
  <title>DevTown-Admin</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    .swal-modal {
      padding: 30px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="Logo\Circle_1980x1980.png" alt="" height="350px" width="350px"> 
    </div> -->

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

      <!-- Right navbar links -->
      <!-- <ul class="navbar-nav ml-auto">        
        <li class="nav-item mx-2">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul> -->
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
                  comments
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payment_details.php" class="nav-link active">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>
                  courses purchased
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
            <li class="nav-item">
              <a href="premium_course.php" class="nav-link">
                <i class="fa-solid fa-gem"></i>
                <p>
                  premium
                </p>
              </a>
            </li>
            <li class="nav-item">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="card card-primary" id="blog_detail">
        <div class="card-header card-primary text-lg">
          <div class="container d-flex justify-content-between align-items-center">
            Courses Purchased Details
          </div>
        </div>
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Sr.No</th>
                <th>Product Name</th>
                <th>User</th>
                <th>E-mail</th>
                <th>Amount</th>
                <th>transaction_id</th>
                <th>Payment Status</th>
                <th>Date & Time</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "devtown";
              $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
              if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
              }
              $sql_display = "SELECT * FROM `tbl_payment`";
              // $sql_display = "SELECT * FROM blog WHERE Flag = 0";
              $result = mysqli_query($conn, $sql_display);
              $count = 1;
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['transaction_id']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                  </tr>
              <?php
                  $count++;
                }
              }
              ?>
            </tbody>
          </table>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
        <!-- /.content-wrapper -->
      </div>
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
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- DataTable -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap - 5  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

</html>
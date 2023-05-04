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
  <!-- DataTable style -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
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
          <a href="Admin.php" class="nav-link">Home</a>
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
      <div class="card card-primary" id="admin_detail">
        <div class="card-header text-lg">
          <div class="container d-flex justify-content-between align-items-center">
            Users Details
          </div>
        </div>
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Country</th>
                <th>state</th>
                <th>City</th>
                <th>Activity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql_display = "SELECT * FROM `users`";
              $result = mysqli_query($con, $sql_display);
              $count = 1;
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
              ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['Country']; ?></td>
                    <td><?php echo $row['State']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td><abbr title="Edit"><a href="user_activity.php?activity=<?php echo $row['user_id']; ?>"><i name="btn_course_edit" class="fas fa-user-edit text-lg" style="color: rgb(5, 182, 5); cursor: pointer;"></i></a></abbr>
                    </td>
                  </tr>
              <?php
                  $count++;
                }
                // $_SESSION['U'] = $result;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022-2023 <a href="#">DevTown</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

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
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
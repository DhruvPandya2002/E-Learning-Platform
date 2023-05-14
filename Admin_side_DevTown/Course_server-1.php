<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('location:index.php');
}

include("footer.php");
// MySQl Connection
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
  die(mysqli_error($con));

$update_state = false;
$title = null;
$image = null;

// Submit button click on insert in course table
if (isset($_POST['btn_course'])) {
  $course_title = $_POST['course_title'];
  $course_image = $_FILES['course_image']['name'];
  // Upload Images Save in folder
  $tempname = $_FILES['course_image']['tmp_name'];
  $folder = "Images/Course_image/" . $course_image;
  move_uploaded_file($tempname, $folder);
  // insert data in database
  $course_insert = "INSERT INTO `course`(`c_Name`, `c_Photo`, `c_InsertedBy`, `Flag`) VALUES ('$course_title','$course_image','$_SESSION[User]','0')";
  if (mysqli_query($con, $course_insert)) {
    $_SESSION['status'] = 'course added';
    $_SESSION['status_code'] = 'success';
    header('location:Course.php'); // redirecting 
  } else {
    $_SESSION['status'] = 'course not added';
    $_SESSION['status_code'] = 'error';
  }
}

//fetch record for update data
if (isset($_GET['updateid'])) {
  $id = $_GET['updateid'];
  $update_state = true;
  $sql = "SELECT * FROM course WHERE c_Id=$id";
  $result = mysqli_query($con, $sql);
  $record = mysqli_fetch_array($result);
  $title = $record['c_Name'];
  $image = $record['c_Photo'];
}
// Update data on click update 
if (isset($_POST['btn_update'])) {
  $updateid = $_GET['updateid'];
  $update_course_title = $_POST['course_title'];
  $update_course_image = $_FILES['course_image']['name'];

  // Upload Images Save in folder
  $update_tempname = $_FILES['course_image']['tmp_name'];
  $update_folder = "Images/Course_image/" . $update_course_image;
  move_uploaded_file($update_tempname, $update_folder);

  // update data in database
  $query = "UPDATE `course` SET `c_Name`= '$update_course_title',`c_Photo`='$update_course_image',`c_InsertedBy`='$_SESSION[User]' WHERE `c_Id` = '$updateid'";
  if (mysqli_query($con, $query)) {
    $_SESSION['status'] = 'Update Success';
    $_SESSION['status_code'] = 'success';
    header('location:Course.php');
  } else {
    $_SESSION['status'] = 'Update Fail';
    $_SESSION['status_code'] = 'error';
  }
}

//delete record 
if (isset($_POST['delete_btn_set'])) {
  $del_id = $_POST['delete_id'];
  $sql = "UPDATE `course` SET `Flag`='1'  WHERE `c_Id` = '$del_id'";
  mysqli_query($con, $sql);
  header('location:Course.php');
}

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
            <li class="nav-item">
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
              <a href="Course.php" class="nav-link active">
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <form action="" method="post" enctype="multipart/form-data">
        <!-- Add Course form -->
        <div class="card card-primary" id="add_blog">
          <?php if ($update_state == false) : ?>
            <div class="card-header text-lg">
              Add Course
            </div>
          <?php else : ?>
            <div class="card-header text-lg">
              Update Course
            </div>
          <?php endif ?>
          <div class="card-body">
            <div class="container-fluid d-flex flex-row">
              <div class="d-flex flex-column col-6">
                <input type="hidden" name="course_id" value="" id="hidden_id">
                <label for="Title" class="mx-2 text-gray-600">Course Title</label>
                <input type="text" name="course_title" id="course_title" value="<?php echo $title; ?>" class="form-control w-80" placeholder="Enter Title...">
              </div>
            </div>
            <?php if ($update_state == true) { ?>
              <div class="mt-3 container-fluid d-flex flex-row">
                <div class="d-flex flex-column">
                  <img src="Images/Course_image/<?php echo $image; ?>" alt="<?php $image; ?>" width="70px" />
                </div>
              </div>
          </div>
        <?php }
        ?>
        <div class="container-fluid d-flex flex-row">
          <div class="d-flex flex-column ml-4">
            <label for="content" class="mx-2 text-gray-600">Please Select New Course Image :</label>
            <input type="file" name="course_image" id="course_image" value="<?php echo $image; ?>">
          </div>
        </div>
        <div class="mt-3 card-footer card-primary">
          <div class="d-flex justify-content-end">
            <?php if ($update_state == false) : ?>
              <button name="btn_course" class="bg-primary form-control col-1" type="submit">Submit</button>
            <?php else : ?>
              <button name="btn_update" class="bg-primary form-control col-1" type="submit">Update</button>
            <?php endif ?>
          </div>
        </div>
        </div>
      </form>
    </div>

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
  <!-- DataTable -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $('#myTable').DataTable();
  </script>
</body>

</html>
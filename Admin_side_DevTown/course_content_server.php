<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('location:index.php');
}
include("footer.php");
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
  die(mysqli_error($con));

// data fetching for uppdate    
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $edit_state = true;
  $update = "SELECT * FROM `course_content` WHERE `content_id` = '$id'";
  $result  = mysqli_query($con, $update);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $type = $row['type'];
      $course_name = $row['course_name'];
      $topic_name = $row['topic_name'];
      $content = $row['content'];
    }
  }
}

// update data
if (isset($_POST['update'])) {
  $type = $_POST['type'];
  $course_name = $_POST['course_name'];
  if ($type == "Text") {
    $content = $_POST['text_content'];
    $topic = $_POST['text_topic'];
  } else {
    $content = $_POST['video_content'];
    $topic = $_POST['video_topic'];
  }
  $sql = "UPDATE `course_content` SET `type`='$type',`course_name`='$course_name',`topic_name`='$topic',`content`='$content',`updatedBy`='$_SESSION[User]' WHERE `content_id`='$id'";
  $finalupdate = mysqli_query($con, $sql);
  if ($finalupdate) {
    $_SESSION['status'] = 'Update Success';
    $_SESSION['status_code'] = 'success';
    header('location:Course_content.php'); // redirecting to Blog page 
  } else {
    $_SESSION['status'] = 'Update Fail';
    $_SESSION['status_code'] = 'error';
  }
}


if (isset($_POST['delete_btn_set'])) {
  $del_id = $_POST['delete_id'];
  $mydelete = "UPDATE `course_content` SET `deletedBy`='$_SESSION[User]',`Flag`='1' WHERE `content_id`='$del_id'";
  mysqli_query($con, $mydelete);
  header('location:Course_content.php'); // redirecting to Course_content page
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
              <a href="#footer" class="nav-link">
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
              <a href="Course_content.php" class="nav-link active">
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
          </ul>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <p>
                LogOut
              </p>
            </a>
          </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <form action="" method="post">
        <div class="card card-primary" id="add_blog">
          <div class="card-header text-lg">
            Update Course Content
          </div>
          <div class="card-body">
            <div class="container-fluid d-flex flex-row">
              <div class="d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">UpdateCourse:</label>
                <select name="course_name" id="course" class="form-control">
                  <option value="<?php echo $course_name; ?>">
                    <?php echo $course_name; ?>
                  </option>
                  <?php
                  $sql = "SELECT * FROM course WHERE Flag=0";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <option value="<?php echo $row['c_Name']; ?>">
                        <?php echo $row['c_Name']; ?>
                      </option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mt-3 container-fluid d-flex flex-row">
              <div class="d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">Select Content Type:</label>
                <select name="type" id="type" class="form-control">
                  <option class="d-none" value="<?php echo $type; ?>">
                    <?php echo $type; ?></option>
                  <option value="Video">Video</option>
                  <option value="Text">Text</option>
                </select>
              </div>
            </div>
            <div id="text_type" style="display:none">
              <div class="mt-3 container-fluid d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">Topic Name:</label>
                <input type="text" name="text_topic" id="text_topic" class="form-control col-6" placeholder="Enter Your Topic Name..." value="<?php echo $topic_name; ?>">
              </div>
              <div class="mt-3 container-fluid d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">Write your Content:</label>
                <textarea name="text_content" id="content" class="form-control w-full h-[350px]">
                  <?php if (isset($content)) echo $content; ?></textarea>
              </div>
            </div>
            <div id="video_type" style="display:none">
              <div class="mt-3 container-fluid d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">Topic Name:</label>
                <input type="text" name="video_topic" id="video_topic" class="form-control col-6" placeholder="Enter Your Topic Name..." value="<?php echo $topic_name; ?>">
              </div>
              <div class="mt-3 container-fluid d-flex flex-column">
                <label for="content" class="mx-2 text-gray-600">Update Your iframe video link:</label>
                <input type="text" name="video_content" id="video_content" class="form-control col-6" placeholder="Enter Your iframe link..." value="<?php echo $content; ?>">
              </div>
            </div>
          </div>
          <div class="card-footer card-primary">
            <div class="d-flex justify-content-end">
              <button class="bg-primary form-control col-1" id="btn_content" name="update" type="submit">Update</button>
            </div>
          </div>
        </div>
      </form>
      <!-- <div class="card card-primary" id="blog_detail">
        <div class="card-header text-lg">
          <div class="container d-flex justify-content-between align-items-center">
            Course Content Detail            
          </div>
        </div>
      </div> -->
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
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- DataTable -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });

    function myBlog() {
      var add_blog = document.querySelector('#add_blog');
      var blog_detail = document.querySelector('#blog_detail');
      add_blog.style.display = 'block';
      blog_detail.style.display = 'none';
    }

    $(document).ready(function() {
      $('#type').change(function() {
        var opt = $(this).val();
        if (opt == "Text") {
          $('#text_type').css('display', 'block');
          $('#video_type').css('display', 'none').hide();
        } else {
          $('#text_type').css('display', 'none').hide();
          $('#video_type').css('display', 'block');
        }
      });
    });
  </script>
  <script src="ckeditor_custom/ckeditor.js"></script>
  <script src="ckfinder/ckfinder.js"></script>
  <script>
    var editor = CKEDITOR.replace('content');
    CKFinder.setupCKEditor(editor);
  </script>
</body>

</html>
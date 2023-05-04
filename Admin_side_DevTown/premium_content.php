<?php

use LDAP\Result;

session_start();

if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}

$value = "premium_server.php";
$_SESSION['value'] = $value;
include("footer.php");

$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

if (isset($_POST['content_submit'])) {
    $course_name = $_POST['Course'];
    $content = $_POST['video_content'];
    $topic = $_POST['video_topic'];

    $iframe_html = $content;
    $dom = new DOMDocument();
    $dom->loadHTML($iframe_html);
    $xpath = new DOMXPath($dom);
    $src = $xpath->query("//iframe/@src")->item(0)->nodeValue;
    preg_match('/\/embed\/(.+)/', $src, $matches);
    $video_id = $matches[1];

    $sql = "INSERT INTO `premium_course` (`premium_course_name`,`topic_name`,`content`,`insertedBy`,`video_id`,`flag`)VALUES ('$course_name','$topic','$content','$_SESSION[admin]','$video_id',0)";
    $Result = mysqli_query($con, $sql);
    if ($Result) {
        $_SESSION['status'] = 'Course content Added';
        $_SESSION['status_code'] = 'success';
        header('location:premium_content.php');
    } else {
        $_SESSION['status'] = 'Not Added';
        $_SESSION['status_code'] = 'error';
    }

    $video_insert = "INSERT INTO `videos` (`video_id`) VALUES ('$video_id')";
    $video_result = mysqli_query($con, $video_insert);
    if (!$video_result and !$Result) {
        echo "<script>alert('Error inserting record in videos or premium_course')</script>";
    }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            padding: 30px;
            margin: 0;
        }

        .post {
            font-family: "Poppins", sans-serif;
        }

        .post p {
            font-size: 14px;
        }

        .post button {
            padding: 10px;
            background-color: #ff0268;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .post:not(:last-child) {
            margin-bottom: 50px;
        }

        .hide {
            display: none;
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
                            <a href="premium_content.php" class="nav-link active">
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
            <form action="premium_content.php" method="post">
                <div class="card card-primary" id="add_blog" style="display: none;">
                    <div class="card-header text-lg">
                        Add Course Content
                    </div>
                    <div class="card-body">
                        <div class="container-fluid d-flex flex-row">
                            <div class="d-flex flex-column">
                                <label for="content" class="mx-2 text-gray-600">Select Course:</label>
                                <select name="Course" id="course" class="form-control">
                                    <option selected class="d-none">Choose Course</option>
                                    <?php
                                    $sql = "SELECT * FROM premium WHERE flag=0";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <option value="<?php echo $row['course_name']; ?>"><?php echo $row['course_name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="video_type">
                            <div class="mt-3 container-fluid d-flex flex-column">
                                <label for="content" class="mx-2 text-gray-600">Topic Name:</label>
                                <input type="text" name="video_topic" class="form-control col-6" placeholder="Enter Your Topic Name...">
                            </div>
                            <div class="mt-3 container-fluid d-flex flex-column">
                                <label for="content" class="mx-2 text-gray-600">Enter Your iframe video link:</label>
                                <input type="text" name="video_content" class="form-control col-6" placeholder="Enter Your iframe link...">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card-primary">
                        <div class="d-flex justify-content-end">
                            <button class="bg-primary form-control col-1" id="btn_content" name="content_submit" type="submit">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
            <div class="card card-primary" id="blog_detail">
                <div class="card-header text-lg">
                    <div class="container d-flex justify-content-between align-items-center">
                        Premium Course Content
                        <button class="btn-success form-control col-lg-2 elevation-1" id="btn_add_admin" onclick="myBlog()">Add Content</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.No</th>
                                <th>Course Name</th>
                                <th>Topic Name</th>
                                <th>video_id</th>
                                <th>Opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `premium_course` WHERE `flag`='0'";
                            $result = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $longtext = $row['content'];
                            ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['premium_course_name']; ?></td>
                                        <td><?php echo $row['topic_name']; ?></td>
                                        <td><?php echo $row['video_id']; ?></td>
                                        <td><span><a href="premium_server.php?edit=<?php echo $row['premium_id']; ?>"><abbr title='Update'><i class='fas fa-user-edit text-lg' style='color: rgb(5, 182, 5); cursor: pointer;'></i></abbr></a></span>
                                            <span><abbr title="Delete"><a class="del_id"><i class="fas fa-trash text-lg ml-4" style="color: red; cursor: pointer;"></i></a></abbr></span>
                                        </td>
                                        <input type="hidden" class="delete_id" id="delete_id" name="delete_id" value="<?php echo $row['premium_id']; ?>">
                                    </tr>
                            <?php
                                    $count++;
                                }
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
    </script>
    <script src="ckeditor_custom/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script>
        var editor = CKEDITOR.replace('content');
        CKFinder.setupCKEditor(editor);
    </script>
    <!-- readmore.js file 
  <script src="readmore.js"></script> -->
</body>

</html>
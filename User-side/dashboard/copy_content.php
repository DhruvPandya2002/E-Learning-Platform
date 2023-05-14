<?php
include("letter_image.php");
include("comment_server.php");
error_reporting(0);
session_start();
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));
if(!isset($_SESSION['User'])){
  header('location:../login.php');
}
$email = $_SESSION['email'];
$_SESSION['premium_id'] = '';
$premium_course_id = $_GET['premium_course_id'];
$premium_course_name = $_GET['premium_course_name'];
$_SESSION['premium_course_name'] = $premium_course_name;
$_SESSION['premium_course_id']=$premium_course_id;

// fetch total_videos and watched_videos
// $final_sql = "SELECT * FROM `user_watched` WHERE `user_name`='$_SESSION[User]', `course_name`='$premium_course_name'";
// $final_result = mysqli_query($conn, $final_sql);
// $row = mysqli_fetch_array($final_result);
// $total_video = $row['total_videos'];
// $watched_video = $row['watched_videos'];
// echo $total_video;
// echo $watched_video;
// while ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>DevTown Course Content</title>

  <meta name="description" content="" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../Logo/Circle_1980x1980.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>
  <style>
        /* .nav-btn {
            position: relative;
            padding-bottom: 5px;
        }

        .nav-btn .line {
            height: 2px;
            position: absolute;
            bottom: 0;
            margin: 10px 0 0 0;
            background: #FF1847;
        }

        .nav-btn ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
        }

        .nav-btn ul li {
            margin: 0 40px 0 0;
            opacity: .6;
            transition: all 0.4s ease;
        }

        .nav-btn ul li:hover {
            opacity: .7;
        }

        .nav-btn ul li.active {
            opacity: 1;
        }

        .nav-btn ul li:last-child {
            margin-right: 0;
        }

        .nav-btn ul li a {
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            display: block;
            font-weight: 700;
            letter-spacing: .1em;
        }*/

        .input-container input[type="text"]:focus~.label,
        .input-container input[type="text"]:valid~.label {
            top: -12px;
            font-size: 16px;
            color: #333;
        }

        .input-container .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 95%;
            background-color: #333;
            transform: scaleX(0);
            transition: all 0.3s ease;
        }

        .input-container input[type="text"]:focus~.underline,
        .input-container input[type="text"]:valid~.underline {
            transform: scaleX(1);
        } 
    </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <!-- <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="../index.php" class="app-brand-link">
            <img src="../Logo/Circle_1980x1980.png" alt="" class="w-12">
            <span class="app-brand-text text-capitalize demo fw-bolder ms-2 text-[#30559E]" style="font-family: 'Lobster', cursive;">DevTown</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1"> -->
          <!-- Dashboard -->
          <!--<li class="menu-item">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle text-[#30559E]"></i>
              <div data-i18n="Analytics" class="text-[#30559E] text-lg">Dashboard</div>
            </a>
          </li>
          <li class="menu-item active mt-2">
            <a href="my_courses.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book text-[#30559E]"></i>
              <div data-i18n="Analytics" class="text-[#30559E] text-lg">My Courses</div>
            </a>
          </li>
        </ul>
      </aside> -->
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page" style="padding-left: 0;">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <!-- <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div> -->
          <div>
            <a class="nav-item nav-link px-0 me-xl-4" href="my_courses.php">
              <img src="../Logo/left-arrow.svg" alt="" class="w-6">
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <!-- <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div> -->
            <!-- /Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <span class="app-brand-text text-capitalize fw-bolder fs-5 text-2xl text-[#30559E] font-medium ml-3"><?php echo $_GET['premium_course_name'];?></span>
              </div>
            </div>
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
                  data-icon="octicon-star" data-size="large" data-show-count="true"
                  aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li> -->

              <!-- User -->
              <!-- <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li> -->
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="mt-4 xl:mt-24">
        <div class="px-2 xl:px-4 lg:px-2 md:px-6 flex flex-col lg:flex-row lg:justify-center justify-start xl:gap-3 gap-3">
            <div class="flex justify-center items-center lg:justify-center lg:items-start">
                <?php
                if (!$_GET['premium_id']) {
                    $query = "SELECT * FROM `premium_course` WHERE `premium_course_id` = '$premium_course_id' and `flag` = 0 LIMIT 1";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $_SESSION['premium_id'] = $row['premium_id'];
                      $iframe_html = $row['content'];


                        $dom = new DOMDocument();
                        $dom->loadHTML($iframe_html);


                        $xpath = new DOMXPath($dom);
                        $src = $xpath->query("//iframe/@src")->item(0)->nodeValue;

                        preg_match('/\/embed\/(.+)/', $src, $matches);
                        $video_id = $matches[1];
                ?>
                        <div class="h-[35vh] w-[380px] sm:my-5 sm:mx-2 sm:w-[620px] md:w-[460vh] md:h-[40vh] lg:w-[110vh] lg:h-[60vh] lg:my-3 lg:mx-2 xl:h-[60vh] xl:w-[110vh] xl:my-0 xl:mx-0 2xl:w-[130vh] 2xl:h-[70vh] shadow-lg" id="player">
                          <?php echo $row['content']; ?>
                        </div>
                    <?php
                    }
                } else {
                  $_SESSION['premium_id'] = $_GET['premium_id'];
                  $premium_id = $_SESSION['premium_id'];
                    // $_SESSION['premium_course_id'] = $_GET['premium_course_id'];
                    $query = "SELECT * FROM `premium_course` WHERE `premium_id` = '$premium_id' and `premium_course_id` = '$premium_course_id' and `flag` = 0";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $iframe_html = $row['content'];


                        $dom = new DOMDocument();
                        $dom->loadHTML($iframe_html);


                        $xpath = new DOMXPath($dom);
                        $src = $xpath->query("//iframe/@src")->item(0)->nodeValue;


                        preg_match('/\/embed\/(.+)/', $src, $matches);
                        $video_id = $matches[1];
                    ?>
                        <div class="h-[35vh] w-[380px] sm:my-5 sm:mx-2 sm:w-[620px] md:w-[460vh] md:h-[40vh] lg:w-[110vh] lg:h-[60vh] lg:my-3 lg:mx-2 xl:h-[60vh] xl:w-[110vh] xl:my-0 xl:mx-0 2xl:w-[130vh] 2xl:h-[70vh] shadow-lg" id="player">
                          <?php echo $row['content']; ?>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <!-- <div class="nav-btn flex justify-center items-center my-5 lg:hidden">
                <ul>
                    <li class="active sm:text-3xl syllabus"><a href="#playlist">Syllabus</a></li>
                    <li class="sm:text-3xl discussion"><a href="#discussion">Discussion</a></li>
                </ul>
            </div> -->
            <!-- Playlist -->
            <div id="playlist" class="bg-[#DCE1F9] mx-1 mb-3 py-4 px-2 text-lg sm:text-2xl sm:my-2 lg:text-lg lg:h-[61vh] xl:px-4 xl:py-4 flex flex-col xl:w-[27rem] xl:h-[60vh] xl:my-0 xl:mx-4 2xl:h-[70vh] rounded-xl overflow-y-auto ">
                <h1 class="text-gray-900 text-xl sm:text-3xl lg:text-xl font-bold ml-3">Playlist :</h1>
                <?php
                $sql = "SELECT * FROM `premium_course` WHERE `premium_course_id` = '$premium_course_id' and `flag` = 0";
                $record = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_assoc($record)) {
                ?>
                    <a href="course_content.php?premium_id=<?php echo $data['premium_id']; ?>&premium_course_id=<?php echo $data['premium_course_id']; ?>&premium_course_name=<?php echo $data['premium_course_name'];?>" class="py-3 px-3 text-[#30559E] font-medium active:text-gray-900">
                        <h1 class="text-[#30559E]"><?php echo $data['topic_name']; ?></h1>
                    </a>
                    <div class="mb-1 mx-2 bg-[#30559E] h-[1.5px]"></div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Discussion -->
        <div id="discussion" class="flex flex-col px-3 py-2 sm:py-7 sm:m-4 md:mt-5 lg:mt-2 lg:py-3 lg:px-2">
            <div class="flex justify-center items-center lg:w-[110vh] lg:bg-transparent rounded-xl mb-4">
                <?php
                letters_images();
                ?>
                <form id="comment-form" action="" method="post" id="commentForm" class="flex input-container relative w-full ml-2">
                    <input type="text" id="input_comment" name="enter_comment" required="" class="comment_inserted text-xl sm:text-2xl w-full border-b-2 border-b-gray-300 pt-[14px] bg-transparent outline-none">
                    <label for="input" class="text-xl sm:text-2xl label absolute top-3 left-2 text-gray-400 transition-all duration-300 pointer-events-none">Add a Comment...</label>
                    <div class="underline"></div>
                    <input type="hidden" id="commentId" value="0" name="parent_id">
                    <button class="comment_send" type="submit" id="send"><img src="../Logo/send.svg" alt="" class="w-10 ml-1"></button>
                </form>
            </div>
        <div id="comments"></div>
        <script>
    //session variables
    var premium_id = '<?php echo $_SESSION['premium_id']; ?>';
    var premium_course_id = '<?php echo $_GET['premium_course_id']; ?>';
    var sender = '<?php echo $_SESSION['User']; ?>';
    // alert(premium_id);
    // alert(premium_course_id);
    // alert(sender);
    
  $(function() {
  $('#comment-form').submit(function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();
    
    // Get the form data
    var formData = $(this).serialize();
    formData += '&premium_id=' + premium_id;
    formData += '&premium_course_id=' + premium_course_id;
    formData += '&sender=' + sender;
    formData += '&comment=' + $('#input_comment').val();
    formData += '&parent_id' + $('#commentId').val();

    // Send an AJAX request to store the comment in the database
    $.ajax({
      url: 'store_comment_p.php',
      type: 'POST',
      data: formData,
      success: function(data) {
        // If the comment was stored successfully, update the comments section on the page
        // $('input[name=enter_comment]').val('');
        $('#comment-form')[0].reset();
        getComments();
      }
    });
  });

  
  function getComments() {
    // Send an AJAX request to retrieve the list of comments from the server
    $.get('get_comments.php', function(data) {
      // Update the comments section on the page with the new comment
      $('#comments').html(data);
    });
  }
  
  // Call the getComments function when the page is loaded
  getComments();
});

</script>

        <!-- getting comments using ajax Hemant -->
          <!-- <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-[#30559E] text-xl font-medium">Welcome <?php //echo $_SESSION['User'];?>! 🎉</h5>
                        <p class="mb-4 text-lg font-medium">
                          You are now officially <br> a member of DevTown Family.-->
                          <!-- <span class="fw-bold">72%</span> more sales today. Check your new badge in
                          your profile. 
                        </p> -->

                        <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
                      <!-- </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img src="assets/img/illustrations/man-with-laptop-light.png" height="140"
                          alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-4 col-md-4 order-1"> -->
                <!-- <div class="row">
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                              class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Profit</span>
                        <h3 class="card-title mb-2">$12,628</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span>Sales</span>
                        <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                      </div>
                    </div>
                  </div>
                </div> -->
              <!-- </div> -->
              <!-- Total Revenue -->
              <!-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                  <div class="row row-bordered g-0">
                    <div class="col-md-8">
                      <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                      <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body">
                        <div class="text-center">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                              id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              2022
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                              <a class="dropdown-item" href="javascript:void(0);">2021</a>
                              <a class="dropdown-item" href="javascript:void(0);">2020</a>
                              <a class="dropdown-item" href="javascript:void(0);">2019</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="growthChart"></div>
                      <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                      <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                        <div class="d-flex">
                          <div class="me-2">
                            <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                          </div>
                          <div class="d-flex flex-column">
                            <small>2022</small>
                            <h6 class="mb-0">$32.5k</h6>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="me-2">
                            <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                          </div>
                          <div class="d-flex flex-column">
                            <small>2021</small>
                            <h6 class="mb-0">$41.2k</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!--/ Total Revenue -->
              <!-- <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2"> -->
                <!-- <div class="row">
                   <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="d-block mb-1">Payments</span>
                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                      </div>
                    </div>
                  </div> 
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Transactions</span>
                        <h3 class="card-title mb-2">$14,857</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                      </div>
                    </div>
                  </div> -->
                  <!-- </div>
    <div class="row"> -->
                  <!-- <div class="col-12 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                              <h5 class="text-nowrap mb-2">Profile Report</h5>
                              <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                            </div>
                            <div class="mt-sm-auto">
                              <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                                68.2%</small>
                              <h3 class="mb-0">$84,686k</h3>
                            </div>
                          </div>
                          <div id="profileReportChart"></div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                <!-- </div>
              </div>
            </div>
            <div class="row"> -->
              <!-- Order Statistics -->
              <!-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Order Statistics</h5>
                      <small class="text-muted">42.82k Total Sales</small>
                    </div>
                    <div class="dropdown">
                      <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex flex-column align-items-center gap-1">
                        <h2 class="mb-2">8,258</h2>
                        <span>Total Orders</span>
                      </div>
                      <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Electronic</h6>
                            <small class="text-muted">Mobile, Earbuds, TV</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">82.5k</small>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Fashion</h6>
                            <small class="text-muted">T-shirt, Jeans, Shoes</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">23.8k</small>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Decor</h6>
                            <small class="text-muted">Fine Art, Dining</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">849k</small>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Sports</h6>
                            <small class="text-muted">Football, Cricket Kit</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold">99</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
              <!--/ Order Statistics -->

              <!-- Expense Overview -->
              <!-- <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="card h-100">
                  <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                          data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                          aria-selected="true">
                          Income
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Expenses</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Profit</button>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body px-0">
                    <div class="tab-content p-0">
                      <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                        <div class="d-flex p-4 pt-3">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                          </div>
                          <div>
                            <small class="text-muted d-block">Total Balance</small>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 me-1">$459.10</h6>
                              <small class="text-success fw-semibold">
                                <i class="bx bx-chevron-up"></i>
                                42.9%
                              </small>
                            </div>
                          </div>
                        </div>
                        <div id="incomeChart"></div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                          <div class="flex-shrink-0">
                            <div id="expensesOfWeek"></div>
                          </div>
                          <div>
                            <p class="mb-n1 mt-1">Expenses This Week</p>
                            <small class="text-muted">$39 less than last week</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!--/ Expense Overview -->

              <!-- Transactions -->
              <!-- <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                      <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="p-0 m-0">
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Paypal</small>
                            <h6 class="mb-0">Send money</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">+82.6</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Wallet</small>
                            <h6 class="mb-0">Mac'D</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">+270.69</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Transfer</small>
                            <h6 class="mb-0">Refund</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">+637.91</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Credit Card</small>
                            <h6 class="mb-0">Ordered Food</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">-838.71</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Wallet</small>
                            <h6 class="mb-0">Starbucks</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">+203.33</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Mastercard</small>
                            <h6 class="mb-0">Ordered Food</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">-92.45</h6>
                            <span class="text-muted">USD</span>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
              <!--/ Transactions -->
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <!-- <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
              <div>
                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                  target="_blank" class="footer-link me-4">Documentation</a>

                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                  class="footer-link me-4">Support</a>
              </div>
            </div>
          </footer> -->
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <?php
$last = "SELECT `video_id` AS `vid` FROM `premium_course` WHERE `premium_course_id` = 1 AND `premium_course_name` = 'Data Structure and Algorithms' ORDER BY `premium_id` DESC LIMIT 1";
$last_result = mysqli_query($conn, $last);
if (mysqli_num_rows($last_result)) {
  $row = mysqli_fetch_array($last_result);
  $pre_id = $row['vid'];
  echo $pre_id;
}

// echo "premium table " . $pre_id;
echo "<br>";
$video_sql = "SELECT * FROM `videos` WHERE `user_name` = '$_SESSION[User]' ORDER BY `id`DESC LIMIT 1";
$video_result = mysqli_query($conn, $video_sql);
if (mysqli_num_rows($video_result)) {
  $row = mysqli_fetch_array($video_result);
  $video_result_id = $row['video_id'];
  echo $video_result_id;
}
echo "video tabel " . $video_result_id;
?>
  <!-- / Layout wrapper -->

  <!-- <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
      class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div> -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script>
    // nav button
    // var nav = $('.nav-btn');
    //     var line = $('<div />').addClass('line');

    //     line.appendTo(nav);

    //     var active = nav.find('.active');
    //     var pos = 0;
    //     var wid = 0;

    //     if (active.length) {
    //         pos = active.position().left;
    //         wid = active.width();
    //         line.css({
    //             left: pos,
    //             width: wid
    //         });
    //     }

    //     nav.find('ul li a').click(function(e) {
    //         e.preventDefault();
    //         if (!$(this).parent().hasClass('active') && !nav.hasClass('animate')) {

    //             nav.addClass('animate');

    //             var _this = $(this);

    //             nav.find('ul li').removeClass('active');

    //             var position = _this.parent().position();
    //             var width = _this.parent().width();

    //             if (position.left >= pos) {
    //                 line.animate({
    //                     width: ((position.left - pos) + width)
    //                 }, 300, function() {
    //                     line.animate({
    //                         width: width,
    //                         left: position.left
    //                     }, 150, function() {
    //                         nav.removeClass('animate');
    //                     });
    //                     _this.parent().addClass('active');
    //                 });
    //             } else {
    //                 line.animate({
    //                     left: position.left,
    //                     width: ((pos - position.left) + wid)
    //                 }, 300, function() {
    //                     line.animate({
    //                         width: width
    //                     }, 150, function() {
    //                         nav.removeClass('animate');
    //                     });
    //                     _this.parent().addClass('active');
    //                 });
    //             }

    //             pos = position.left;
    //             wid = width;
    //         }
    //     });
  </script>
  <!-- video monitoring system -->
  <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        var id = "<?php echo $video_id; ?>";
        var video = {
            id: id,
            iframeId: "player",
            watched: false,
            player: null,
        };

        function onYouTubeIframeAPIReady() {
            video.player = new YT.Player(video.iframeId, {
                videoId: video.id,
                events: {
                    onStateChange: onPlayerStateChange,
                },
            });
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                video.watched = false;
            }
            if (event.data == YT.PlayerState.ENDED) {
                video.watched = true;
                saveWatchedState();
            }
        }

        function saveWatchedState() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_watched_state.php");
            xhr.setRequestHeader(
                "Content-Type",
                "application/x-www-form-urlencoded"
            );
            xhr.onload = function() {
                if (xhr.status === 200 && xhr.responseText !== "OK") {
                    alert("Error saving watched state: " + xhr.responseText);
                }
            };
            xhr.send(
                "video_id=" +
                encodeURIComponent(video.id) +
                "&watched=" +
                encodeURIComponent(video.watched)
            );
        }
    </script>
    <script>
    var total_video = <?php echo $pre_id; ?>;
    var watched_videos = <?php echo $video_result_id; ?>;
    console.log(total_video);
    console.log(watched_videos);
    if (total_video === watched_videos) {
      window.location.href = "certificate/form_certificate.php";
  }
 </script>
</body>

</html>
<?php
session_start();
error_reporting(0);
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

// echo $_SESSION['User'];

// if (!isset($_SESSION['UID'])) {
//     header('location:index.php');
//     die();
// }
$uid = $_SESSION['UID'];
$status = 0;
// echo $_SESSION['email'];
if (isset($_POST['logout'])) {
    $_SESSION['email'];
    $email = $_SESSION['email'];
    $_SESSION['date'];
    $_SESSION['UID'];
    $_SESSION['User'];
    $username = $_SESSION['User'];
    $today_date = $_SESSION['date'];
    $sql  = "UPDATE `users` SET `user_status`='$status' WHERE `user_id`='$uid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $username = $_SESSION['User'];
        $today_date = $_SESSION['date'];

        // Check if a row exists for current user and today's date with no logout time 
        $query = "SELECT * FROM `user_status` WHERE `user_name`='$username' AND `date`='$today_date'";
        $result_logout = mysqli_query($con, $query);

        if (mysqli_num_rows($result_logout) > 0) {

            // Updateing the existing row with the logout time

            $logout_time = date("H:i:s"); // getting the current logout time
            $update_query = "UPDATE `user_status` SET `logout`='$logout_time' WHERE `user_name`='$username' AND `date`='$today_date'";
            mysqli_query($con, $update_query);

            // get the user's login , logout times and difference from the user table
            $sql = "SELECT `login` , `logout` , `difference` FROM `user_status` WHERE `user_name` = '$username' AND `date`='$today_date'";
            $result = mysqli_query($con, $sql);

            // calculate the total time difference
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $login_time = strtotime($row["login"]);
                $logout_time = strtotime($row["logout"]);

                // total time difference calculation
                $diff = $row["difference"];
                $total_time = $logout_time - $login_time;
                // $new_total_time = strtotime($total_time);
                // $new_diff = $total_time + $diff;

                // update the user's total time difference into the difference column of the user table
                // $sql = "UPDATE `user_status` SET `difference` = '$new_diff' WHERE `user_name` = '$username' AND `date`='$today_date'";
                // if (mysqli_query($con, $sql)) {
                //     echo "Total time difference updated successfully";
                // } else {
                //     echo "Error updating total time difference: " . mysqli_error($con);
                // }
            }
        } else {
            // No row found for current user and today's date with logout , do nothing
        }
        header('location:logout.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="png" href="Logo/Circle_1980x1980.png" />
    <link rel="stylesheet" href="style.css" />
    <title>DevTown</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper_new {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            /* text-align: center;
        font-size: 18px; */
            /* background: #fff; */
            display: inline-flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 230px;
            height: 290px;
        }

        .swiper-wrapper {
            padding-bottom: 30px;
        }

        .swiper-container-horizontal>.swiper-pagination-bullets,
        .swiper-pagination-custom,
        .swiper-pagination-fraction {
            bottom: 0px !important;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes wiggle {

            0%,
            to {
                transform: scale(1);
                filter: hue-rotate(0)
            }

            30%,
            90% {
                filter: hue-rotate(20deg)
            }

            50% {
                transform: scale(1.5);
                filter: hue-rotate(45deg)
            }
        }

        .animate_wiggle {
            animation-duration: 15s;
            animation-timing-function: ease-in-out;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: normal;
            animation-fill-mode: none;
            animation-play-state: running;
            animation-name: wiggle;
        }

        .circle_animation {
            animation-name: spin;
            animation-duration: 55s;
            animation-timing-function: linear;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: normal;
            animation-fill-mode: none;
            animation-play-state: running;
        }

        .crotate {
            animation-name: spin;
            animation-duration: 55s;
            animation-timing-function: linear;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: reverse;
            animation-fill-mode: none;
            animation-play-state: running;
        }

        .crotate2 {
            animation: spin 45s linear infinite;
        }

        .circle_animation2 {
            animation: spin 25s linear infinite reverse;
        }

        .card {
            position: relative;
            width: 230px;
            height: 290px;
            background: lightgrey;
            box-shadow: #d11bff42 0 15px 40px -5px;
            z-index: 1;
            border-radius: 21px;
            overflow: hidden;
        }

        .card__content {
            background: linear-gradient(rgba(255, 255, 255, 0.473), rgba(150, 150, 150, 0.25));
            z-index: 1;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 21px;
        }

        .card .blob {
            position: absolute;
            z-index: -1;
            border-radius: 5em;
            width: 200px;
            height: 200px;
        }

        .card .blob:nth-child(2) {
            left: -50px;
            top: -90px;
            background: #ff930f;
        }

        .card .blob:nth-child(3) {
            left: 110px;
            top: -20px;
            z-index: -1;
            background: #bf0fff;
        }

        .card .blob:nth-child(4) {
            left: -40px;
            top: 100px;
            background: #ff1b6b;
        }

        .card .blob:nth-child(5) {
            left: 100px;
            top: 180px;
            background: #0061ff;
        }

        @media screen and (min-width: 850px) and (max-width : 1023px) {
            .tablet {
                display: inline-flex;
                flex-direction: row-reverse;
                justify-content: center;
                align-items: center;
                padding-left: 20px;
            }

            .main_photo {
                width: max-content;
                height: auto;
            }

            .main_text h1 {
                padding: 0;
                padding-top: 100px;
                font-size: 30px;
            }

            .sub_text h3 {
                font-size: 22px;
            }

            .feature_card {
                margin-left: 30px;
                margin-right: 30px;
            }
        }
    </style>
</head>

<body class="bg-white scroll-smooth" style="-webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
    <div class="overflow-hidden">
        <div class="fixed z-[9999] w-full">
            <!-- Navbar -->
            <nav class="navbar h-16 sm:h-20 backdrop-blur-sm" style="box-shadow: rgba(157, 157, 157, 0.3) 0 4px 10px">
                <ul class="flex justify-between items-center">
                    <li class="flex justify-center items-center">
                        <a href="index.php"><img src="Logo/Circle_1980x1980.png" alt="DevTown" class="w-14 m-1 p-1 sm:w-[74px]" /></a>
                        <p class="text-3xl sm:text-[40px] text-[#30559E]" style="font-family: 'Lobster', cursive;">
                            DevTown
                        </p>
                    </li>
                    <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl">About us</li>
                    <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl"><a href="Course.php">Courses</a></li>
                    <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl">Contact</li>
                    <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl">Blog</li>
                    <!-- <li class="flex justify-center items-center hidden md:block md:text-xl">Labs <i class="fa-solid fa-angle-down" style="color: #000000;" class></i>
                        <div class="compiler bg-white shadow-lg rounded-2xl ml-10 mt-10" style="display : none;">
                            <ul class="flex flex-col justify-start">
                                <li class="text-sm px-5 pt-5 text-gray-600"><span class="text-xl font-medium text-gray-700 hover:text-black">Programming Compiler</span><br><span>Write and run code in multiple <br>programming language from anywhere.</span></li>
                                <li class="text-sm p-5 text-gray-600"><span class="text-xl font-medium text-gray-700">Web Designing</span><br><span>Write and run code for Web <br>Designing from anywhere.</span></li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl "><a href="final_compiler/home.php" class="list-none">Compiler</a></li>
                    <?php 
                        if(!$_SESSION['User']){
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
                        }else{
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><form method="post"><input type="submit" value="Logout" name="logout" class="bg-[#30559E] cursor-pointer text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl" /></form></li>';
                        }
                    
                    ?>
                    <!-- <li class="flex hidden md:block justify-center items-center mr-3"><form method="post"><a href="login.php"><button type="submit" class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Logout<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></form></li> -->
                    <li class="flex justify-center items-center">
                        <input type="hidden" value="0" id="menu_toggle" />
                        <div class="relative flex h-[40px] w-[40px] cursor-pointer flex-col items-end justify-between p-[0.4rem] md:hidden" style="-webkit-tap-highlight-color: transparent" id="menu">
                            <span class="w-10 rounded-md py-[2px] false bg-[#011229] transition-all duration-300" id="first"></span>
                            <span class="w-8 py-[2px] rounded-md bg-[#011229] transition-all duration-300" id="second"></span>
                            <span class="w-6 false rounded-md bg-[#011229] py-[2px] transition-all duration-300" id="third"></span>
                        </div>
                        <div class="mx-2 cursor-pointer" style="-webkit-tap-highlight-color: transparent">
                            <div class="moon" id="theme-toggle">
                                <!-- <svg width="40px" height="40px" viewBox="0 0 24.00 24.00" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#30559E">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                        stroke="#CCCCCC" stroke-width="0.336" />
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="Environment / Moon">
                                            <path id="Vector"
                                                d="M9 6C9 10.9706 13.0294 15 18 15C18.9093 15 19.787 14.8655 20.6144 14.6147C19.4943 18.3103 16.0613 20.9999 12 20.9999C7.02944 20.9999 3 16.9707 3 12.0001C3 7.93883 5.69007 4.50583 9.38561 3.38574C9.13484 4.21311 9 5.09074 9 6Z"
                                                stroke="#30559E" stroke-width="2.4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </g>
                                </svg> -->
                            </div>
                            <!-- <div class="sun hidden">
                                <img src="Logo/sun.svg" alt="Sun" width="40px" height="40px">
                            </div> -->
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="animate__animated animate__fadeIn animate__faster absolute top-full left-0 right-0 z-[9998] backdrop-blur-lg pt-[8vh] pb-[8vh] font-rubik md:hidden  opacity-1 pointer-events-auto visible transition-all duration-300 menu" style="background-color: rgba(255, 255, 255, 0.25); box-shadow: rgba(157, 157, 157, 0.2) 0px 4px 10px; display: none;">
                <ul class="flex flex-col items-center gap-y-6 md:hidden select-none">
                    <li class="text-center text-xl sm:text-2xl"><a href="#">About Us</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="Course.php">Courses</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="#">Blogs</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="#">Programming Compiler</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="#">Web Design Compiler</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="#">Contact</a></li>
                    <?php
                        if(!$_SESSION['User']){
                            echo '<li><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-lg">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a>
                            </li>';
                        }else{
                            echo '<li class="flex md:block justify-center items-center mr-3"><form method="post"><input type="submit" value="Logout" name="logout" class="bg-[#30559E] cursor-pointer text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl" /></form></li>';
                        }
                    ?>
                </ul>
                <div class="mt-6 flex w-full flex-col items-center justify-center gap-x-2 md:hidden">

                </div>
            </div>
        </div>
        <div class="absolute left-0 top-0 flex w-full justify-end -z-[1000] blur-3xl">
            <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                    <img src="Logo/wiggle_second.svg" aria-hidden="true" alt="" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                </span>
                <img src="Logo/wiggle_animation_image.svg" alt="background-gradient" decoding="async" data-nimg="intrinsic" class="animate_wiggle" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
            </span>
        </div>
        <!-- Main Image -->
        <div class="tablet lg:flex lg:flex-row-reverse lg:justify-between lg:items-center xl:w-full">
            <div class="main_image mt-28 mb-10 xl:pr-16">
                <div class="flex flex-col justify-center items-center">
                    <img src="Logo/home_Page_image.svg" alt="home_image" class="main_photo sm:w-5/6 md:w-9/12 xl:w-[720px]">
                </div>
            </div>
            <!-- Hero Text -->
            <div class="hero_text flex flex-col justify-center gap-y-3 md:gap-y-6 md:min-w-[400px] lg:w-72 lg:ml-8 ml-3 mb-8 xl:m-0 xl:min-w-[600px] xl:p-12">
                <div class="main_text">
                    <h1 class="text-3xl font-bold md:text-4xl md:pl-[13rem] xl:text-5xl text-[#759DEA] sm:pl-[8rem] sm:text-4xl lg:pl-0 lg:pt-16" style="font-family: 'Rubik', sans-serif;">Learn <span class="text-[#30559E]">With </span><span class="auto-type" style="color: #30559E;"></span></h1>
                </div>
                <div class="sub_text flex justify-start sm:justify-center lg:justify-start" data-aos="fade-right" data-aos-delay="50">
                    <h3 class="text-xl sm:text-2xl font-semibold text-[#4A4F5C] xl:text-4xl">Empowering your education,anytime,anywhere.
                    </h3>
                </div>
                <div class="button_div flex items-center justify-start sm:justify-center md:justify-center lg:justify-start  gap-x-6" data-aos="fade-right" data-aos-delay="100">
                    <a href="">
                        <button class="active:outline-none active:ring-2 active:ring-[#30559E] active:ring-offset-2 cursor-pointer rounded-md bg-[#30559E] text-[#fff] sm:text-lg border-[#30559E] xl:text-xl text-sm border lg:text-md xl:px-9 px-5 xl:py-4 py-2" style="font-family: 'Rubik', sans-serif;">View Courses</button>
                    </a>
                    <a href="">
                        <button class="active:outline-none active:ring-2 active:ring-[#30559E] active:ring-offset-2 cursor-pointer place-items-center rounded-md border sm:text-lg sm:w-40 xl:text-xl text-sm text-[#011229] font-rubik border-[#30559E] xl:px-9 px-5 xl:py-4 py-2 w-28">Practice</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Counter -->
        <div class="bg-[#30559E] grid grid-rows-2 md:hidden counter_section">
            <div class="grid grid-cols-2 px-8 pt-12 pb-6 gap-x-6 text-center text-white" style="background-image: url(Logo/counter_design_2.svg); background-repeat: no-repeat; background-position-x: right;">
                <div class="text-4xl sm:text-5xl">
                    <span class="courses">500</span>+
                    <div class="text-xl sm:text-2xl">Courses</div>
                </div>
                <div class="text-4xl sm:text-5xl">
                    <span class="companies">350</span>+
                    <div class="text-xl sm:text-2xl">Companies</div>
                </div>
            </div>
            <div class="grid grid-cols-2 px-8 pb-12 pt-6 gap-x-6 text-white" style="background-image: url(Logo/counter_design.svg); background-repeat: no-repeat; background-position-y: bottom;">
                <div class="text-4xl text-center sm:text-5xl">
                    <span class="users">300</span>+
                    <div class="text-xl sm:text-2xl">Active User</div>
                </div>
                <div class="text-4xl text-center sm:text-5xl">
                    <span class="watch">400</span>Hr
                    <div class="text-xl sm:text-2xl">Watch Time</div>
                </div>
            </div>
        </div>
        <div class=" hidden md:block md:bg-[#30559E] grid grid-rows-1 counter_section">
            <div class="grid grid-cols-4 px-8 pt-12 pb-12 text-center text-white xl:py-20">
                <div class="text-4xl sm:text-5xl px-5 py-3 xl:px-10 xl:py-6 xl:text-6xl">
                    <span class="courses">500</span>+
                    <div class="text-xl sm:text-2xl xl:text-3xl">Courses</div>
                </div>
                <div class="text-4xl sm:text-5xl border-x-2  border-white px-5 py-3 xl:px-10 xl:py-6 xl:text-6xl">
                    <span class="companies">350</span>+
                    <div class="text-xl sm:text-2xl xl:text-3xl">Companies</div>
                </div>
                <div class="text-4xl text-center sm:text-5xl border-r-2 border-white px-5 py-3 xl:px-10 xl:py-6 xl:text-6xl">
                    <span class="users">300</span>+
                    <div class="text-xl sm:text-2xl xl:text-3xl">Active User</div>
                </div>
                <div class="text-4xl text-center sm:text-5xl px-5 py-3 xl:px-10 xl:py-6 xl:text-6xl">
                    <span class="watch">400</span>Hr
                    <div class="text-xl sm:text-2xl xl:text-3xl">Watch Time</div>
                </div>
            </div>
        </div>
        <!-- Why Devtown Section -->
        <div class="p-6 pt-10 bg-[#f7f8fc] sm:pt-14 sm:px-10 md:px-20 lg:px-40">
            <h3 class="text-xl text-center font-medium text-[#30559E] sm:text-2xl md:text-3xl">Why DevTown?</h3>
            <h1 class="text-2xl sm:text-3xl md:text-4xl md:mt-3 xl:text-5xl xl:px-28 text-center font-medium text-[#011229]">Making learning easier and more
                convenient for you.</h1>
            <!-- Cards -->
            <div class="feature_card flex flex-col justify-center items-center mt-8 py-4 sm:mx-20 lg:mx-0 lg:grid lg:grid-cols-2 lg:gap-y-16 lg:gap-x-16 gap-y-10">
                <!-- Expert Trainer -->
                <div class="flex flex-col items-center justify-center px-6 py-10 bg-white rounded-xl border-b-[6px] border-[#f5afb4] shadow-md xl:px-16 xl:py-16" data-aos="fade-right">
                    <img src="Logo/manager.png" alt="Expert Trainer" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3">Expert Trainers</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">We Constantly evalute our trainers and
                        only the “Best” Provides the Training</h5>
                </div>
                <!-- Flexible Schedule -->
                <div class="flex flex-col items-center justify-center px-6 py-10 bg-white rounded-xl border-b-[6px] border-[#9cdbd3] shadow-md xl:px-16 xl:py-16" data-aos="fade-up">
                    <img src="Logo/clock.png" alt="Flexible Schedule" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3">Flexible Schedule</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">Do not hesitate to ask... because we
                        will work according to your calendar</h5>
                </div>
                <!-- Instructor Training Sessions -->
                <div class="flex flex-col items-center justify-center px-6 py-8 bg-white rounded-xl border-b-[6px] border-[#b1a3fe] shadow-md xl:px-16 xl:py-16" data-aos="fade-left">
                    <img src="Logo/programmer.png" alt="Instructor Training Sessions" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3 text-center">Instructor Training
                        Sessions</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">We believe to provide our students the
                        Best interactive experience as part of their learning</h5>
                </div>
                <!-- Industry Specific Scenarios -->
                <div class="flex flex-col items-center justify-center px-6 py-10 bg-white rounded-xl border-b-[6px] border-[#a3cbe0] shadow-md h-full xl:px-16 xl:py-16" data-aos="fade-right">
                    <img src="Logo/OIP.jfif" alt="Industry Specific Scenarios" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3 text-center">Industry Specific
                        Scenarios</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">Students are provided with all the
                        Rea-Time and Relevant Scenarios</h5>
                </div>
                <!-- E-Learning Session -->
                <div class="flex flex-col items-center justify-center px-6 py-10 bg-white rounded-xl border-b-[6px] border-[#fdc8a4] shadow-md xl:px-16 xl:py-16" data-aos="fade-up">
                    <img src="Logo/online-lesson.png" alt="E-Learning Session" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3">E-Learning Session</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">Online training sessions are held Live
                        and we provide students with the Training Videos</h5>
                </div>
                <!-- 24/7 Support -->
                <div class="flex flex-col items-center justify-center px-6 py-10 bg-white rounded-xl border-b-[6px] border-[#a6d9fe] shadow-md h-full xl:px-16 xl:py-16" data-aos="fade-left">
                    <img src="Logo/24-hours-support.png" alt="24/7 Support" class="w-20 h-20 sm:w-28 sm:h-28" />
                    <h3 class="text-xl sm:text-2xl font-medium text-[#000000] mt-3">24/7 Support</h3>
                    <h5 class="text-lg sm:text-xl text-gray-700 text-center mt-2">No Problem@all...!!! Your Question
                        will be answers by Us at any hour of the time</h5>
                </div>
            </div>
        </div>

        <!-- Course Cards -->
        <div class="bg-[#f7f8fc]">
            <div class="flex flex-col justify-center pt-10 sm:pt-14 px-20 text-2xl font-medium sm:text-3xl md:text-4xl xl:text-5xl xl:pt-20" data-aos="fade-up">
                <p class="text-[#000000] text-center">What would you like to
                    <span class="text-[#759DEA]">learn?</span>
                </p>
            </div>
            <div>
                <div class="py-14 px-5 gap-x-5 flex flex-col justify-center items-center gap-y-8 md:hidden lg:hidden">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/c.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn C with <br />tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/c++.svg" alt="cpp" width="90px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn C++ with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/java.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn Java with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/python.svg" alt="cpp" width="80px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn Python with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/php.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn PHP with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/javascript.svg" alt="cpp" width="80px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn Javascript with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="py-14 px-5 gap-x-5 flex flex-col justify-center items-center gap-y-8 hidden lg:block md:block">
                    <div class="swiper_new">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/c.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn C with <br />tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/c++.svg" alt="cpp" width="90px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn C++ with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/java.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg lg:text-md">
                                        Learn Java with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/python.svg" alt="cpp" width="80px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn Python with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/php.svg" alt="cpp" width="100px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn PHP with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="card__content py-10 flex flex-col justify-center items-center gap-y-3">
                                    <img src="Logo/course/javascript.svg" alt="cpp" width="80px" height="80px" />
                                    <p class="text-center text-white font-medium text-lg">
                                        Learn Javascript with <br />
                                        tutorial and docs
                                    </p>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-7 py-1 shadow-md">
                                        Start tutorial
                                    </button>
                                    <button class="bg-[#BED4FF] text-black font-medium text-center rounded-md px-5 py-1 shadow-md">
                                        Documentation
                                    </button>
                                </div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev_new"></div>
                        <div class="swiper-button-next_new"></div>
                        <div class="swiper-pagination_new"></div>
                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar_new    "></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Companies circle animation section -->
        <div class="flex justify-between items-center sm:justify-center">
            <div class="flex flex-col sm:justify-start sm:px-16 lg:flex-row pt-10 sm:pt-14 pb-4 w-full lg:px-0 lg:grid lg:grid-cols-2 lg:py-24 xl:px-32">
                <div class="px-8 sm:px-0 lg:flex lg:flex-col lg:justify-center lg:items-start lg:pl-20 xl:pl-28">
                    <p class="text-lg sm:text-xl uppercase font-semibold text-[#30559E] lg:text-2xl" data-aos="fade-right">
                        <span>placements</span>
                    </p>
                    <p class="mt-3 mb-5 text-2xl sm:text-3xl sm:mt-5 font-medium lg:text-5xl xl:text-[42px]" data-aos="fade-right" data-aos-delay="100">
                        <span>Get Offers from <br> Top Companies</span>
                    </p>
                </div>
                <div class="relative flex w-full justify-center items-center py-16 px-4 md:py-10 sm:px-8 lg:px-0 lg:py-0">
                    <div class="outer_wheel circle_animation relative grid h-72 w-72 place-content-center rounded-full border border-purple-100 transition-all sm:h-96 sm:w-96">
                        <div class="crotate absolute h-16 top-[-1.75rem] left-[7rem] w-16 sm:top-[-28px] sm:left-[160px]">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/apple.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="crotate absolute top-[2.5rem] left-[-0.5rem] h-16 w-16 sm:top-[100px] sm:left-[-20px]">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/amazon.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="crotate absolute h-16 top-[11rem] left-[-1.25rem] sm:top-[270px] sm:left-0 w-16">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/meta.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="crotate absolute h-16 w-16 top-[11rem] left-[15rem] sm:top-[270px] sm:left-[320px]">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/netflix.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="crotate absolute h-16 w-16 top-[2.5rem] left-[15rem] sm:top-[100px] sm:left-[340px]">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/google.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="crotate absolute h-16 w-16 top-[16rem] left-[8rem] sm:top-[354px] sm:left-[170px]">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                <img src="Logo/circle/microsoft.png" alt="circle logo" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            </span>
                        </div>
                        <div class="circle_animation2 relative grid h-52 w-52 place-content-center rounded-full bg-purple-100 sm:h-72 sm:w-72">
                            <div class="inner_cicle h-32 w-32 rounded-full bg-[#fff] sm:h-40 sm:w-40 ">
                                <div class="crotate2 absolute h-16 w-16 top-[1.25rem] left-[75px] sm:top-[43px] sm:left-[110px]">
                                    <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                        <img src="Logo/circle/ola.png" alt="circle logo" decoding="async" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                                <div class="crotate2 absolute h-16 w-16 top-[5rem] left-[0.75rem] sm:top-[120px] sm:left-[35px]">
                                    <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                        <img src="Logo/circle/adobe.png" alt="circle logo" decoding="async" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                                <div class="crotate2 absolute h-16 w-16 top-[9rem] left-[5rem] sm:top-[120px] sm:left-[190px]">
                                    <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                        <img src="Logo/circle/flipkart.png" alt="circle logo" decoding="async" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                                <div class="crotate2 absolute h-16 w-16 top-[5rem] left-[135px] sm:top-[195px] sm:left-[110px]">
                                    <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
                                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span>
                                        <img src="Logo/circle/linkedin.png" alt="circle logo" decoding="async" data-nimg="responsive" class="scale-[2.2]" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- interview preparation -->
        <div class="bg-[#f7f8fc]">
            <div class="flex flex-col justify-center pt-10 px-10 text-2xl sm:pt-16 sm:text-3xl md:text-4xl font-medium xl:text-5xl xl:pt-20" data-aos="fade-up">
                <p class="text-[#000000] text-center flex flex-col">Crack the Interview of
                    <span class="text-[#759DEA]">Top Companies</span>
                </p>
            </div>
            <!-- <div class="py-8 px-4 flex flex-col justify-center items-center gap-y-6 sm:py-12 sm:px-12 md:px-28 lg:grid lg:grid-cols-2 lg:gap-7 xl:mt-10 xl:gap-20">
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8 xl:p-10">
                        <img src="Logo/dsa1.png" alt="DSA" class="rounded-xl">
                        <h3 class="text-lg sm:pt-3 sm:text-2xl md:text-3xl md:pt-6 md:pb-4 lg:text-xl pt-1 font-medium xl:text-2xl">Learn <br> Data Structure & Algorithm
                        </h3>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:font-medium sm:h-12 md:text-2xl md:h-14 rounded-md shadow-md">Start
                            Tutorial</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8">
                        <img src="Logo/5994421.jpg" alt="Os" class="rounded-xl lg:h-[174.21px] xl:h-[280px] w-full">
                        <h3 class="text-lg pt-1 sm:pt-3 sm:text-2xl font-medium md:text-3xl md:pt-6 md:pb-4 lg:text-xl xl:text-2xl">Learn <br> Operating System </h3>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:h-12 sm:font-medium rounded-md shadow-md md:text-2xl md:h-14">Start
                            Tutorial</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8">
                        <img src="Logo/1032.jpg" alt="DSA" class="rounded-xl lg:h-[174.21px] xl:h-[280px] w-full">
                        <h3 class="text-lg pt-1 sm:text-xl sm:pt-3 font-medium md:text-3xl md:pt-6 md:pb-4 lg:text-xl xl:text-2xl">Learn <br> Database Management System
                        </h3>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:h-12 sm:font-medium rounded-md shadow-md md:text-2xl md:h-14">Start
                            Tutorial</button>
                    </div>
                </div>
            </div> -->
            <div class="py-8 px-4 flex flex-col justify-center items-center gap-y-6 sm:py-12 sm:px-12 md:px-28 lg:grid lg:grid-cols-2 lg:gap-7 xl:mt-10 xl:gap-20">
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8 xl:p-10">
                        <img src="Logo/dsa1.png" alt="DSA" class="rounded-xl">
                        <div class="flex justify-between">
                        <h3 class="text-lg sm:pt-3 sm:text-2xl md:text-3xl md:pt-6 md:pb-4 lg:text-xl pt-1 font-medium xl:text-2xl">Learn <br> 
                        <div><p id="product_name"> Data Structure & Algorithm </p></div>
                        </h3><div>
                        <h2 class="mt-5">₹<p id="amount">5999</p></h2>
                        <!-- <input type="number" name="amount" class="amount"> -->
                        </div>
                        </div>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:font-medium sm:h-12 md:text-2xl md:h-14 rounded-md shadow-md" onclick="pay_now()" value="Pay Now">Buy Now</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8">
                        <img src="Logo/5994421.jpg" alt="Os" class="rounded-xl lg:h-[174.21px] xl:h-[280px] w-full">
                        <div class="flex justify-between">
                        <h3 class="product_name text-lg pt-1 sm:pt-3 sm:text-2xl font-medium md:text-3xl md:pt-6 md:pb-4 lg:text-xl xl:text-2xl">Learn <br> Operating System </h3>
                        <h2 class="amount mt-5">₹3999</h2>
                        </div>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:h-12 sm:font-medium rounded-md shadow-md md:text-2xl md:h-14">Buy Now</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="p-4 sm:p-8">
                        <img src="Logo/1032.jpg" alt="DSA" class="rounded-xl lg:h-[174.21px] xl:h-[280px] w-full">
                        <div class="flex justify-between">
                        <h3 class="product_name text-lg pt-1 sm:text-xl sm:pt-3 font-medium md:text-3xl md:pt-6 md:pb-4 lg:text-xl xl:text-2xl">Learn <br> Database Management System
                        </h3>
                        <h2 class="amount mt-5">₹2999</h2>
                        </div>
                        <button class="bg-[#759DEA] text-center w-full mt-3 h-10 text-lg font-normal sm:text-xl sm:h-12 sm:font-medium rounded-md shadow-md md:text-2xl md:h-14">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="px-4 divide-y bg-[#759DEA]">
            <div class="container flex flex-col justify-between py-10 mx-auto space-y-8 lg:flex-row lg:space-y-0">
                <div class="lg:w-1/3">
                    <a rel="" href="#" class="flex justify-center space-x-3 lg:justify-center lg:mt-10">
                        <!-- <div class="flex items-center justify-center w-12 h-12 rounded-full">
                            <img src="Logo/Circle_1980x1980.png" alt="Devtown">                            
                        </div> -->
                        <span class="self-center text-[#30559E] text-4xl sm:text-5xl xl:text-7xl font-semibold" style="font-family: 'Lobster', cursive;">DevTown</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 text-sm gap-x-3 gap-y-8 lg:w-2/3 sm:grid-cols-2 sm:text-center pl-6">
                    <div class="space-y-3">
                        <h3 class="tracking-wide font-semibold text-lg uppercase text-[#30559E] sm:text-2xl xl:text-3xl">Menu
                        </h3>
                        <ul class="space-y-1 text-white text-md sm:text-lg sm:space-y-3 xl:text-2xl">
                            <li>
                                <a rel="noopener noreferrer" href="#">About Us</a>
                            </li>
                            <li>
                                <a rel="noopener noreferrer" href="#">Contact Us</a>
                            </li>
                            <li>
                                <a rel="noopener noreferrer" href="Course.php">Courses</a>
                            </li>
                            <li>
                                <a rel="noopener noreferrer" href="#">Blog</a>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-3">
                        <h3 class="tracking-wide text-[#30559E] font-semibold text-lg uppercase sm:text-2xl xl:text-3xl">
                            Compilers</h3>
                        <ul class="space-y-1 text-white text-md sm:space-y-3 sm:text-lg xl:text-2xl">
                            <li>
                                <a rel="noopener noreferrer" href="#">Programming</a>
                            </li>
                            <li>
                                <a rel="noopener noreferrer" href="#">Web Design</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="py-6 text-sm text-center text-white sm:text-lg xl:text-2xl">Copyright © 2023 DevTown. <br> All rights
                reserved.</div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typed.js@2.0.14/dist/typed.umd.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- <script src="dark_light.js"></script> -->
    <!-- <script src="dark_light.js"></script> -->
    <script>
        // Dark - Light Mode
        // const darkToggle = document.querySelector('.moon');
        // const lightToggle = document.querySelector('.sun');
        // darkToggle.addEventListener('click',(event) => {
        //     event.preventDefault();
        //     document.documentElement.classList.add('dark');
        //     darkToggle.classList.add('hidden');
        //     lightToggle.classList.remove('hidden');
        // });
        // lightToggle.addEventListener('click',(event) => {
        //     event.preventDefault();
        //     document.documentElement.classList.remove('dark');
        //     lightToggle.classList.add('hidden');
        //     darkToggle.classList.remove('hidden');
        // });

        // Hamburger Menu Animate
        $(document).ready(function() {
            $("#menu").click(function() {
                var menu_toggle_click = $("#menu_toggle").val();
                if (menu_toggle_click == 0) {
                    $("#first").removeClass();
                    $("#second").removeClass();
                    $("#third").removeClass();
                    $("#first").addClass(
                        "w-10 rounded-md py-[2px] absolute top-1/2 rotate-45 bg-[#011229] transition-all duration-300"
                    );
                    $("#second").addClass(
                        "w-10 absolute top-1/2 py-0 opacity-0 rounded-md bg-[#011229] transition-all duration-300"
                    );
                    $("#third").addClass(
                        "w-10 absolute top-1/2 -rotate-45 bg-[#011229] rounded-md py-[2px] transition-all duration-300"
                    );
                    menu_toggle_click = $("#menu_toggle").val("1");
                    $(".menu").css('display', 'block');
                } else {
                    $("#first").removeClass();
                    $("#second").removeClass();
                    $("#third").removeClass();
                    $("#first").addClass(
                        "w-10 rounded-md py-[2px] false bg-[#011229] transition-all duration-300"
                    );
                    $("#second").addClass(
                        "w-8 py-[2px] rounded-md bg-[#011229] transition-all duration-300"
                    );
                    $("#third").addClass(
                        "w-6 false rounded-md bg-[#011229] py-[2px] transition-all duration-300"
                    );
                    menu_toggle_click = $("#menu_toggle").val("0");
                    $(".menu").css('display', 'none');
                }
            });
        });

        // typing effect on text
        var typed = new Typed(".auto-type", {
            strings: ["DevTown"],
            typeSpeed: 150,
            backSpeed: 150,
            loop: true
        })
        $('.typed-cursor').addClass('text-[#30559E]');

        // counter
        var selector = document.querySelector(".counter_section");
        var courses = document.querySelector(".courses");
        var companies = document.querySelector(".companies");
        var users = document.querySelector(".users");
        var watch = document.querySelector(".watch");
        let CounterObserver = new IntersectionObserver((entries, observer) => {
            let [entry] = entries;
            if (!entry.isIntersecting) return;

            let counter_courses = 1;
            let counter_companies = 1;
            let counter_users = 1;
            let counter_watch = 1;
            setInterval(() => {
                if (counter_courses < 500) {
                    counter_courses++;
                    courses.innerText = counter_courses;
                }
                if (counter_companies < 350) {
                    counter_companies++;
                    companies.innerText = counter_companies;
                }
                if (counter_users < 300) {
                    counter_users++;
                    users.innerText = counter_users;
                }
                if (counter_watch < 400) {
                    counter_watch++;
                    watch.innerText = counter_watch;
                }
            }, 1);
        }, {
            root: null,
            threshold: 0.4,
        });
        CounterObserver.observe(selector);
    </script>

    <!-- Payment System Code -->
    <script>
        function pay_now(){
			
            var pro_name= document.getElementById('product_name');
            var product_name=pro_name.textContent;
            var user= '<?php echo $_SESSION['User']; ?>';
            var email= '<?php echo $_SESSION['email']; ?>';
            var amt= document.getElementById('amount');
            var amount = amt.textContent;
            // alert(amount);
            // alert(product_name);
            // alert(user);
            // alert(email);
			jQuery.ajax({
				url: 'payment-proccess.php',
				type: 'post',
				// dataType: 'json',
				data:"&product_name="+product_name+"&amount="+amount+"&user="+user+"&email="+email,
				success: function(msg) {
					var options = {
						"key": "rzp_test_uZ1lSqeEpMsKxl",
						"amount": amount * 100,
						"name": "DevTown",
						"description": "Payment",
						"image": "Logo/Square_1980x1980.png",
						"handler": function(response) {
							console.log(response);
							jQuery.ajax({
								url: 'payment-proccess.php',
								type: 'post',
								// dataType: 'json',
								data:"payment_id="+response.razorpay_payment_id,
								success: function(msg) {
									window.location.href = 'success.php';
								}
							});
						},
						"theme": {
							"color": "#528FF0"
						}
					};
					var rzp1 = new Razorpay(options);
					rzp1.open();
				}
			});

            
        }
    </script>

    <!-- AOS animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>

    <!-- card slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        const swiper_new = new Swiper(".swiper_new", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination_new",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next_new",
                prevEl: ".swiper-button-prev_new",
            },
        });
    </script>
</body>

</html>
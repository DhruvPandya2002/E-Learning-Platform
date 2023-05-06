<?php
include('letter_image.php');
include('comment_server.php');
if (!isset($_SESSION['User'])) {
    header('location:login.php');
}
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));
$premium_course_id = $_GET['premium_course_id'];
$sql = "SELECT * FROM `premium` WHERE `id` = '$premium_course_id' and `flag` = 0";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Structures &amp; Algorithms</title>
    <link rel="icon" href="Logo/Circle_1980x1980.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0" style="overflow: unset; -webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;">
    <div id="__next">
        <div class="overflow-hidden animate-opacityanim bg-[#fff]">
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
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="../about/about.php">About us</a></li>
                        <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl"><a href="Course.php">Courses</a></li>
                        <li class="flex justify-center items-center hidden md:inline-block md:text-xl xl:text-2xl relative">
                            <!--<div class="compiler bg-[#e0f1ff] shadow-lg rounded-2xl w-72 -ml-10 mt-6 absolute animate__animated" id="compiler">
                            <ul class="flex flex-col justify-start">
                                <li class="text-sm px-5 pt-5 text-gray-600"><a href="final_compiler/home.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Programming Compiler</span><br><span>Write and run code in multiple <br>programming language from anywhere.</span></a></li>
                                <li class="text-sm p-5 text-gray-600"><a href="codeeditor/index.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Web Designing</span><br><span>Write and run code for Web <br>Designing from anywhere.</span></a></li>
                            </ul>
                        </div> -->
                            <div class="hover-container">
                                <h1 id="labs" class="cursor-pointer">Labs</h1>
                                <div class="compiler bg-[#e0f1ff] shadow-lg rounded-2xl w-72 -ml-10 mt-6 absolute animate__animated" id="compiler" style="display: none;">
                                    <ul class="flex flex-col justify-start">
                                        <li class="text-sm px-5 pt-5 text-gray-600"><a href="final_compiler/home.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Programming Compiler</span><br><span>Write and run code in multiple <br>programming language from anywhere.</span></a></li>
                                        <li class="text-sm p-5 text-gray-600"><a href="codeeditor/index.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Web Designing</span><br><span>Write and run code for Web <br>Designing from anywhere.</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl">Blog</li>
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="contact.php">Contact</a></li>
                        <!-- <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl "><a href="final_compiler/home.php" class="list-none">Compiler</a></li> -->
                        <?php
                        if (!$_SESSION['User']) {
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="../Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
                        } else {
                            echo '<li class="flex hidden md:block justify-center items-center">
                        <div class="avatar cursor-pointer flex items-center text-xl gap-3 capitalize bg-[#759DEa] py-2 px-3 font-medium rounded-full" id="avatar">';
                            echo letters_images();
                            echo $_SESSION['User'];
                            echo '</div>
                        <div class="avatar-dropdown bg-[#e0f1ff] shadow-lg rounded-2xl w-60 -ml-2 mt-5 absolute animate__animated" id="avatar-dropdown" style="display: none;">
                            <ul class="flex flex-col justify-start">
                                <li class="px-5 pt-3 flex justify-start items-center">
                                    <div>';
                            echo letters_images();
                            echo '</div>
                                    <div class="ml-2 flex flex-col items-start">
                                        <h1 class="capitalize text-lg text-gray-900">';
                            echo $_SESSION['User'];
                            echo '</h1>
                                        <small class="text-gray-700">';
                            echo $_SESSION['email'];
                            echo '</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="border-b-2 border-gray-400 mx-3 mt-2 h-1"></div>
                                </li>
                                <li>
                                    <a href="dashboard/index.php" class="hover:bg-gray-500">
                                    <div class="flex justify-center items-center gap-3 py-3">
                                        <img src="Logo/dashboard.svg" alt="" class="w-7">
                                        <h1 class="text-lg font-medium text-gray-700 hover:text-gray-950">Dashboard</h1>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard/my_courses.php" class="hover:bg-gray-500">
                                    <div class="flex justify-center items-center gap-3 pb-3">
                                        <img src="Logo/profile.svg" alt="" class="w-8">
                                        <h1 class="text-lg font-medium text-gray-700 hover:text-gray-950">My Profile</h1>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="border-b-2 border-gray-400 mx-3 h-1"></div>
                                </li>
                                <li>
                                <a href="logout.php" class="hover:bg-gray-500">
                                    <div class="flex justify-center items-center gap-3 py-3">
                                        <img src="Logo/power.svg" alt="" class="w-7">
                                        <h1 class="text-lg font-medium text-gray-700 hover:text-gray-950">Logout</h1>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>';
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
                        <li class="text-center text-xl sm:text-2xl"><a href="../about/about.php">About Us</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="Course.php">Courses</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="">Blogs</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="final_compiler/home.php">Programming Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="codeeditor/index.php">Web Design Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="contact.php">Contact</a></li>
                        <?php
                        if (!$_SESSION['User']) {
                            echo '<li><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-lg active:outline-none active:ring-2 active:ring-[#30559E] active:ring-offset-2">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a>
                            </li>';
                        } else {
                            echo '<li class="flex md:block justify-center items-center mr-3"><form method="post"><input type="submit" value="Logout" name="logout" class="bg-[#30559E] cursor-pointer text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl" /></form></li>';
                        }
                        ?>
                    </ul>
                    <div class="mt-6 flex w-full flex-col items-center justify-center gap-x-2 md:hidden">

                    </div>
                </div>
            </div>
            <div class="mt-[85px]">
                <div>
                    <div class="w-full bg-[#30559E] relative"><img src="Logo/purchase_course_bg.svg" alt="bg-illus" class="hidden md:block absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52">
                        <div class="2xl:relative mx-auto min-h-[590px] max-w-[1300px] grid md:grid-cols-2 grid-cols-1 gap-4 md:gap-0">
                            <div class="flex flex-col gap-4 place-self-center py-14 px-8 max-w-[650px] text-[#fff] z-30">
                                <div>
                                    <p class="text-[20px]">
                                    <p>Welcome to <strong>@DevTown</strong> Family</p>
                                    </p>
                                    <h1 class="text-[42px] font-bold">Data Structures &amp; Algorithms </h1>
                                </div>
                                <p class="text-[20px]">
                                <p>A comprehensive program that covers the <strong>fundamentals</strong> of data
                                    structures and algorithms. It includes <strong>lectures</strong> and
                                    <strong>exercises</strong> to help students design and implement efficient
                                    solutions. This course is suitable for <strong>beginners</strong> and
                                    <strong>experienced programmers</strong> and aims to prepare students for
                                    <strong>technical interviews and placement exams</strong>.
                                </p>
                                </p>
                                <div class="flex gap-2 items-center"><span>4.9</span>
                                    <div class="flex gap-1 text-yellow-500"><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                            </path>
                                        </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                            </path>
                                        </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                            </path>
                                        </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                            </path>
                                        </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6zm8.9 5v-10.5l1.7 3.8c.1.3.5.5.8.6l4.2.5-3.1 2.8c-.3.2-.4.6-.3 1 0 .2.5 2.2.8 4.1l-3.6-2.1c-.2-.2-.3-.2-.5-.2z">
                                            </path>
                                        </svg></div>
                                </div>
                                <div class="flex gap-5 text-lg">
                                    <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg> Hindi / English</p>
                                    <p class="flex gap-1 items-center"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <desc></desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z">
                                            </path>
                                            <rect x="3" y="6" width="12" height="12" rx="2"></rect>
                                        </svg> 35+ Lectures</p>
                                </div>
                            </div>
                            <div class="relative w-full min-h-[200px] px-8 bottom-[135px] md:bottom-0">
                                <div class="rounded-2xl xl:mr-[75px] p-4 md:absolute md:bottom-[13rem] lg:bottom-[1.75rem] xl:-bottom-[60px] right-[1rem] min-h-[600px] max-w-[423px] mx-auto md:translate-y-0  translate-y-24 flex flex-col gap-4 bg-[#ffffffc2] border border-grey80 shadow-md shadow-grey100 backdrop-blur-md">
                                    <img src="Logo/<?php echo $row['image']; ?>" class="md:max-w-full w-[400px] min-h-[180px] rounded-2xl overflow-hidden" alt="course image">
                                    <div class="px-4">
                                        <p id="product_name" class="hidden"><?php echo $row['course_name']; ?></p>
                                        <div class="text-xl space-x-3 font-semibold mb-3 text-[#000]">₹<span class="text-[#000]" id="amount"><?php echo $row['price']; ?></span>
                                            <span class="text-[#363A45] line-through">₹7000</span>
                                        </div><button class="focus:outline-none focus:ring-2 focus:ring-[#30559E] focus:ring-offset-2 cursor-pointer rounded-md bg-[#30559E] text-[#fff] border-[#30559E] font-rubik xl:text-lg text-sm border text-white100 w-full text-center p-2" onclick="pay_now()">Buy Now</button>
                                        <div class="mt-4 text-headText">
                                            <p class="font-semibold text-xl my-2">This Course Includes :</p>
                                            <div class="flex flex-col gap-3">
                                                <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z">
                                                        </path>
                                                    </svg><span>No Pre-requisite Required</span></p>
                                                <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z">
                                                        </path>
                                                    </svg><span>35+ hours On-Demand Video</span></p>
                                                <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z">
                                                        </path>
                                                    </svg><span>50+ Coding Questions (asked by Top Companies)</span>
                                                </p>
                                                <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z">
                                                        </path>
                                                    </svg><span>DSA - Beginner to Advanced</span></p>
                                                <p class="flex gap-2 items-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z">
                                                        </path>
                                                    </svg><span>with Doubt Assistance</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-[1000px] mx-auto">
                        <div class="py-10 px-8">
                            <div class="border-b-[1.5px] border-[#00000033]">
                                <div class="mt-16">
                                    <div class="text-[24px] leading-8 font-medium">What you will learn</div>
                                    <div class="grid md:grid-cols-2 grid-cols-1 px-5 py-14 gap-4">
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">FlowChart &amp; PseudoCode</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Time &amp; Space Complexity of Recursive Algorithms
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Variables &amp; DataTypes in C++</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Object Oriented Programming Concepts</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Operators, Conditionals &amp; Loops</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Linked List</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Pattern printing</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Stack &amp; Queues</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Function &amp; in-depth Knowledge of flow</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Trees</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Arrays - 1D &amp; 2D</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Heaps</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Dynamic Arrays</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Hashing &amp; Tries</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Searching Algorithms</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Graphs</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Sorting Algorithms</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Greedy Algorithms</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Char Arrays &amp; Strings</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Sliding Window Problems</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Basic Maths &amp; Pointers</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Dynamic Programming</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Recursion &amp; Backtracking</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Bit Manipulation</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Divide &amp; Conquer Technique</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                        <script>
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

                            AOS.init({
                                once: true
                            });

                            var element = document.getElementById("labs");
                            var compiler = document.getElementById("compiler");

                            element.addEventListener("click", function() {
                                if (compiler.style.display === "block") {
                                    compiler.style.display = "none";
                                } else {
                                    compiler.style.display = "block";
                                }
                            });

                            var avatar = document.getElementById("avatar");
                            var avatar_dropdown = document.getElementById("avatar-dropdown");
                            avatar.addEventListener("click", function() {
                                if (avatar_dropdown.style.display === "block") {
                                    avatar_dropdown.style.display = "none"; // wait for 3 seconds (3000 milliseconds) before hiding the element
                                } else {
                                    avatar_dropdown.style.display = "block";
                                }
                            });
                        </script>
                        <!-- Payment System Code -->
                        <script>
                            function pay_now() {
                                var pro_name = document.getElementById('product_name');
                                var product_name = pro_name.textContent;
                                var user = '<?php echo $_SESSION['User']; ?>';
                                var email = '<?php echo $_SESSION['email']; ?>';
                                var amt = document.getElementById('amount');
                                var amount = amt.textContent;
                                // alert(amount);
                                // alert(product_name);
                                // alert(user);
                                // alert(email);
                                jQuery.ajax({
                                    url: 'payment-proccess.php',
                                    type: 'post',
                                    // dataType: 'json',
                                    data: "&product_name=" + product_name + "&amount=" + amount + "&user=" + user + "&email=" + email,
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
                                                    data: "payment_id=" + response.razorpay_payment_id,
                                                    success: function(msg) {
                                                        window.location.href = 'dashboard/index.php';
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
</body>

</html>
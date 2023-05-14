<?php
include("letter_image.php");
include("comment_server.php");
// session_start();
error_reporting(0);
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

$_SESSION['redirect'] = "contact.php";

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
        .wave-group {
            position: relative;
        }

        .wave-group .input {
            font-size: 16px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid #515151;
            background: transparent;
        }

        .wave-group .input:focus {
            outline: none;
        }

        .wave-group .label {
            color: #999;
            font-size: 18px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            display: flex;
        }

        .wave-group .label-char {
            transition: 0.2s ease all;
            transition-delay: calc(var(--index) * .05s);
        }

        .wave-group .input:focus~label .label-char,
        .wave-group .input:valid~label .label-char {
            transform: translateY(-20px);
            font-size: 14px;
            color: #30559E;
        }

        .wave-group .bar {
            position: relative;
            display: block;
            width: 50%;
        }

        .wave-group .bar:before,
        .wave-group .bar:after {
            content: '';
            height: 2px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: #30559E;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all;
        }

        .wave-group .bar:before {
            left: 100%;
        }

        .wave-group .bar:after {
            right: 0%;
        }

        .wave-group .input:focus~.bar:before,
        .wave-group .input:focus~.bar:after {
            width: 100%;
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
                    <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="about.php">About us</a></li>
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
                    <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl"><a href="Blog.php">Blog</a></li>
                    <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="contact.php">Contact</a></li>
                    <!-- <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl "><a href="final_compiler/home.php" class="list-none">Compiler</a></li> -->
                    <?php
                    if (!$_SESSION['User']) {
                        echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
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
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="animate__animated animate__fadeIn animate__faster absolute top-full left-0 right-0 z-[9998] backdrop-blur-lg pt-[8vh] pb-[8vh] font-rubik md:hidden  opacity-1 pointer-events-auto visible transition-all duration-300 menu" style="background-color: rgba(255, 255, 255, 0.25); box-shadow: rgba(157, 157, 157, 0.2) 0px 4px 10px; display: none;">
                <ul class="flex flex-col items-center gap-y-6 md:hidden select-none">
                    <li class="text-center text-xl sm:text-2xl"><a href="about.php">About Us</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="Course.php">Courses</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="Blog.php">Blogs</a></li>
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
    </div>

    <div class="mt-[65px] sm:mt-[83px]">
        <div class="animate__animated animate__fadeIn animate__fast">
            <div class="relative h-fit w-[100vw] overflow-hidden bg-[#000]">
                <div class="sm:h-[60vh] h-[50vh] w-full opacity-40 flex items-center" style="background-image: url('Logo/contact.jpg'); background-color: #30559E; background-size: cover; background-position: center center;">
                </div>
                <div class="absolute sm:top-1/3 top-1/4 left-0 w-full text-[#fff]">
                    <div class="mx-auto max-w-maxScreen px-12 sm:text-start text-center ">
                        <p class="sm:text-[52px] text-5xl font-bold">Get In Touch</p>
                    </div>
                </div>
            </div>
            <div class="mx-auto flex h-full w-[80%] max-w-maxScreen -translate-y-36 flex-col shadow-md md:flex-row">
                <div class="lg:w-[70%] md:w-[60%] bg-[#fff]">
                    <div class="bg-[#fff] px-10 py-12">
                        <div class="flex sm:flex-row flex-col justify-between items-center sm:text-4xl text-2xl mb-14">
                            <p class="font-bold text-center false">Send us a message</p>
                            <div class="text-[#30559E]"><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg></div>
                        </div>
                        <form name="contact-form" method="post" id="contact-form">
                            <div class="grid gap-8 md:grid-cols-2 grid-cols-1 mb-8">
                                <div class="wave-group">
                                    <input required="" type="text" class="input" name="name">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">N</span>
                                        <span class="label-char" style="--index: 1">a</span>
                                        <span class="label-char" style="--index: 2">m</span>
                                        <span class="label-char" style="--index: 3">e</span>
                                    </label>
                                </div>
                                <div class="wave-group">
                                    <input required="" type="text" class="input" name="email">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">E</span>
                                        <span class="label-char" style="--index: 1">m</span>
                                        <span class="label-char" style="--index: 2">a</span>
                                        <span class="label-char" style="--index: 3">i</span>
                                        <span class="label-char" style="--index: 4">l</span>
                                        <span class="label-char" style="--index: 5"> </span>
                                        <span class="label-char ml-1" style="--index: 6">A</span>
                                        <span class="label-char" style="--index: 7">d</span>
                                        <span class="label-char" style="--index: 8">d</span>
                                        <span class="label-char" style="--index: 9">r</span>
                                        <span class="label-char" style="--index: 10">e</span>
                                        <span class="label-char" style="--index: 11">s</span>
                                        <span class="label-char" style="--index: 12">s</span>
                                    </label>
                                </div>
                                <div class="wave-group">
                                    <input required="" type="text" class="input" name="mobile">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">P</span>
                                        <span class="label-char" style="--index: 1">h</span>
                                        <span class="label-char" style="--index: 2">o</span>
                                        <span class="label-char" style="--index: 3">n</span>
                                        <span class="label-char" style="--index: 4">e</span>
                                        <span class="label-char" style="--index: 5"> </span>
                                        <span class="label-char ml-1" style="--index: 6">N</span>
                                        <span class="label-char" style="--index: 7">u</span>
                                        <span class="label-char" style="--index: 8">m</span>
                                        <span class="label-char" style="--index: 9">b</span>
                                        <span class="label-char" style="--index: 10">e</span>
                                        <span class="label-char" style="--index: 11">r</span>
                                    </label>
                                </div>
                                <div class="wave-group">
                                    <input required="" type="text" class="input" name="subject">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">S</span>
                                        <span class="label-char" style="--index: 1">u</span>
                                        <span class="label-char" style="--index: 2">b</span>
                                        <span class="label-char" style="--index: 3">j</span>
                                        <span class="label-char" style="--index: 4">e</span>
                                        <span class="label-char" style="--index: 5">c</span>
                                        <span class="label-char" style="--index: 6">t</span>
                                    </label>
                                </div>
                            </div>
                            <div class="grid">
                            <div class="wave-group">
                                    <input required="" type="text" class="input" name="message">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">M</span>
                                        <span class="label-char" style="--index: 1">e</span>
                                        <span class="label-char" style="--index: 2">s</span>
                                        <span class="label-char" style="--index: 3">s</span>
                                        <span class="label-char" style="--index: 4">a</span>
                                        <span class="label-char" style="--index: 5">g</span>
                                        <span class="label-char" style="--index: 6">e</span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex mx-auto flex-col lg:flex-row items-center justify-between mt-8 md:mt-8">
                                <div class="flex mt-2 lg:mt-0 md:flex-row-reverse md:justify-start justify-center">
                                    <button class="focus:outline-none focus:ring-2 focus:ring-[#30559E] focus:ring-offset-2 
      cursor-pointer
      rounded-md bg-[#30559E] text-[#fff] border-[#30559E] font-rubik xl:text-lg text-sm border px-6 h-12 py-2 flex items-center gap-3 xl:text-xl text-lg lg:h-[4rem]" name="submit">Submit<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <desc></desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="10" y1="14" x2="21" y2="3"></line>
                                            <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                                            </path>
                                        </svg></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col justify-center sm:items-start items-center gap-4 bg-[#30559E] px-5 py-8 text-[#fff] lg:w-[30%] md:w-[40%]">
                    <p class="text-2xl font-bold">Contact Information</p>
                    <div class="grid h-[440px] place-content-center place-self-center gap-2">
                        <div class="mx-auto grid h-[52px] w-[52px] place-content-center rounded-lg bg-[#759DEA] text-2xl">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z">
                                </path>
                            </svg>
                        </div><a href="mailto:devtown2023@gmail.com">
                            <p>devtown2023@gmail.com</p>
                        </a>
                    </div>
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
                            <a rel="noopener noreferrer" href="about.php">About Us</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="contact.php">Contact Us</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="Course.php">Courses</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="Blog.php">Blog</a>
                        </li>
                    </ul>
                </div>
                <div class="space-y-3">
                    <h3 class="tracking-wide text-[#30559E] font-semibold text-lg uppercase sm:text-2xl xl:text-3xl">
                        Compilers</h3>
                    <ul class="space-y-1 text-white text-md sm:space-y-3 sm:text-lg xl:text-2xl">
                        <li>
                            <a rel="noopener noreferrer" href="final_compiler/home.php">Programming</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="codeeditor/index.php">Web Design</a>
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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
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

	$('#contact-form').submit(function(e){
        var name = document.getElementsByName('name');
        var email = document.getElementsByName('email');
        var mobile = document.getElementsByName('mobile');
        var subject = document.getElementsByName('subject');
        var message = document.getElementsByName('message');

		e.preventDefault();
		$.ajax({
			url: 'contact_server.php',
			type: 'POST',
			data: '&name='+name+'&email='+email+'&mobile='+mobile+'&subject='+subject+'&message='+message,
			success: function(data){
                $('#contact-form')[0].reset();
			}
		});
	});
    </script>

    <!-- AOS animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
    <script>
        var element = document.getElementById("labs");
        var compiler = document.getElementById("compiler");
        element.addEventListener("click", function() {
            if (compiler.style.display === "block") {
                compiler.style.display = "none"; // wait for 3 seconds (3000 milliseconds) before hiding the element
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
</body>

</html>
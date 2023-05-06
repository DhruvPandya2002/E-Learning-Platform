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
            color: #5264AE;
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
            background: #5264AE;
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
                    <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="about/about.php">About us</a></li>
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
                    <li class="text-center text-xl sm:text-2xl"><a href="about/about.php">About Us</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="Course.php">Courses</a></li>
                    <li class="text-center text-xl sm:text-2xl"><a href="#">Blogs</a></li>
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
                <div class="sm:h-[60vh] h-[50vh] w-full opacity-40 flex items-center" style="background-color: #30559E; background-size: cover; background-position: center center;">
                </div>
                <div class="absolute sm:top-1/3 top-1/4 left-0 w-full text-[#fff]">
                    <div class="mx-auto max-w-maxScreen px-12 sm:text-start text-center ">
                        <p class="sm:text-[52px] text-5xl font-bold">Get In Touch</p>
                        <p class="sm:text-lg text-base">The Ultimate Guide To Ace SDE Interviews.</p>
                    </div>
                </div>
            </div>
            <div class="mx-auto flex h-full w-[80%] max-w-maxScreen -translate-y-20 flex-col shadow-md md:flex-row">
                <div class="lg:w-[70%] md:w-[60%] bg-[#fff]">
                    <div class="bg-[#fff] px-10 py-12">
                        <div class="flex sm:flex-row flex-col justify-between items-center sm:text-4xl text-2xl mb-14">
                            <p class="font-bold text-center false">Send us a message</p>
                            <div class="text-brand"><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg></div>
                        </div>
                        <form name="contact-form" method="post">
                            <div class="grid gap-8 md:grid-cols-2 grid-cols-1 mb-8">
                                <div class="wave-group">
                                    <input required="" type="text" class="input">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">N</span>
                                        <span class="label-char" style="--index: 1">a</span>
                                        <span class="label-char" style="--index: 2">m</span>
                                        <span class="label-char" style="--index: 3">e</span>
                                    </label>
                                </div>
                                <div class="wave-group">
                                    <input required="" type="text" class="input">
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
                                    <input required="" type="text" class="input">
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
                                    <input required="" type="text" class="input">
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
                                    <input required="" type="text" class="input">
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
                                <!-- <div>
                                            <div>
                                                <div>
                                                    <div style="width: 304px; height: 78px;">
                                                        <div><iframe title="reCAPTCHA"
                                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld51bQjAAAAAIlbrh4zi-mIxM93_fAD_UCawU54&amp;co=aHR0cHM6Ly93d3cudGhlY29kZWhlbHAuaW46NDQz&amp;hl=en&amp;type=image&amp;v=1h-hbVSJRMOQsmO_2qL9cO0z&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=t1edpndbhzev"
                                                                width="304" height="78" role="presentation"
                                                                name="a-rauk6htn4c5l" frameborder="0" scrolling="no"
                                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe>
                                                        </div><textarea id="g-recaptcha-response"
                                                            name="g-recaptcha-response" class="g-recaptcha-response"
                                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                    </div><iframe style="display: none;"></iframe>
                                                </div>
                                            </div><span class="text-[#f00] text-[0.85rem] font-extralight"></span>
                                        </div> -->
                                <div class="flex mt-2 lg:mt-0 md:flex-row-reverse md:justify-start justify-center">
                                    <button class="focus:outline-none focus:ring-2 focus:ring-[#30559E] focus:ring-offset-2 
      cursor-pointer
      rounded-md bg-[#30559E] text-[#fff] border-brand font-rubik xl:text-lg text-sm border px-6 h-12 py-2 flex items-center gap-3 xl:text-xl text-lg lg:h-[4rem]">Submit<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
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
                    <!-- <div class="flex items-center gap-5 text-xl md:text-3xl"><a
                                    href="https://www.youtube.com/channel/UCldyi11QYNXYXiLjVbyw5dA"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z">
                                        </path>
                                    </svg></a><a href="https://www.linkedin.com/in/love-babbar-38ab2887/"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M22.0367422,22 L17.8848745,22 L17.8848745,15.5036305 C17.8848745,13.9543347 17.85863,11.9615082 15.7275829,11.9615082 C13.5676669,11.9615082 13.237862,13.6498994 13.237862,15.3925291 L13.237862,22 L9.0903683,22 L9.0903683,8.64071385 L13.0707725,8.64071385 L13.0707725,10.4673257 L13.1276354,10.4673257 C13.6813927,9.41667396 15.0356049,8.3091593 17.0555507,8.3091593 C21.2599073,8.3091593 22.0367422,11.0753215 22.0367422,14.6734319 L22.0367422,22 Z M4.40923804,6.81585163 C3.07514653,6.81585163 2,5.73720584 2,4.40748841 C2,3.07864579 3.07514653,2 4.40923804,2 C5.73720584,2 6.81585163,3.07864579 6.81585163,4.40748841 C6.81585163,5.73720584 5.73720584,6.81585163 4.40923804,6.81585163 L4.40923804,6.81585163 Z M6.48604672,22 L2.32980492,22 L2.32980492,8.64071385 L6.48604672,8.64071385 L6.48604672,22 Z">
                                        </path>
                                    </svg></a><a href="https://t.me/lovebabbercodehelp"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em"
                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z">
                                        </path>
                                    </svg></a><a href="https://discord.gg/y2yrEcQv75"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em"
                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z">
                                        </path>
                                    </svg></a></div> -->
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
                            <a rel="noopener noreferrer" href="about/about.php">About Us</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="contact.php">Contact Us</a>
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
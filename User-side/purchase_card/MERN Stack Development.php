<?php
session_start();
if (!isset($_SESSION['User'])) {
    header('location:../login.php');
}
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));
$premium_course_id = $_GET['premium_course_id'];
$sql = "SELECT * FROM `premium` WHERE `id` = '$premium_course_id' and `flag` = 0";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MERN Stack Development</title>
    <link rel="icon" href="../Logo/Circle_1980x1980.png">
    <link rel="stylesheet" href="../style.css">
    <meta name="title" content="MERN Stack Development">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true">
    <link rel="stylesheet" href="_next/static/css/51edcbcf532ff452.css" data-n-g="">
    <link rel="stylesheet" href="_next/static/css/f1d5a30b5a4d1378.css" data-n-p="">
    <noscript data-n-css=""></noscript>
    <script defer="" nomodule="" src="_next/static/chunks/polyfills-0d1b80a048d4787e.js"></script>
    <script src="_next/static/chunks/webpack-df4cf1c8d23aa877.js" defer=""></script>
    <script src="_next/static/chunks/framework-4556c45dd113b893.js" defer=""></script>
    <script src="_next/static/chunks/main-572b913902beb9f3.js" defer=""></script>
    <script src="_next/static/chunks/pages/_app-7f0c41f953d8260e.js" defer=""></script>
    <script src="_next/static/chunks/d0c16330-043b3112f1553c69.js" defer=""></script>
    <script src="_next/static/chunks/de71a805-4786b08b982e7a22.js" defer=""></script>
    <script src="_next/static/chunks/d64684d8-6bb0517872081b93.js" defer=""></script>
    <script src="_next/static/chunks/d7eeaac4-87cc4e432b9c1ab2.js" defer=""></script>
    <script src="_next/static/chunks/706-bbfcca55e6b38d6b.js" defer=""></script>
    <style data-href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&amp;display=swap">
        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWZBXyIfDnIV5PNhY1KTN7Z-Yh-B4i1Uw.woff) format('woff')
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWZBXyIfDnIV5PNhY1KTN7Z-Yh-NYi1Uw.woff) format('woff')
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWZBXyIfDnIV5PNhY1KTN7Z-Yh-2Y-1Uw.woff) format('woff')
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nMrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nFrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nDrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nPrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nBrXyw023e.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nMrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nFrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nDrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nPrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nBrXyw023e.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nMrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nFrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nDrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nPrXyw023e1Ik.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v23/iJWKBXyIfDnIV7nBrXyw023e.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }
    </style>
    <link as="script" rel="prefetch" href="_next/static/chunks/pages/index-56c7ea54045c0d2b.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/823-0ccd09d5872e33ab.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/pages/about-3bc1b12e60075cde.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/95b64a6e-6af3ff0511b1462a.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/6728d85a-74b84972e9ad79d2.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/1bfc9850-9aca59ce1657dc9a.js">
</head>

<body data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0" style="overflow: unset;">
    <div id="__next">
        <div class="overflow-hidden animate-opacityanim bg-[#fff]">
            <div class="fixed z-[9999] w-full">
                <!-- Navbar -->
                <nav class="navbar h-16 sm:h-20 backdrop-blur-sm" style="box-shadow: rgba(157, 157, 157, 0.3) 0 4px 10px">
                    <ul class="flex justify-between items-center">
                        <li class="flex justify-center items-center">
                            <a href="../index.php"><img src="../Logo/Circle_1980x1980.png" alt="DevTown" class="w-14 m-1 p-1 sm:w-[74px]" /></a>
                            <a href="../index.php">
                            <p class="text-3xl sm:text-[40px] text-[#30559E]" style="font-family: 'Lobster', cursive;">
                                DevTown
                            </p>
                            </a>
                        </li>
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl">About us</li>
                        <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl"><a href="../Course.php">Courses</a></li>
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
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl">Contact</li>
                        <?php
                        if (!$_SESSION['User']) {
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
                        } else {
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><form method="post"><input type="submit" value="Logout" name="logout" class="bg-[#30559E] cursor-pointer text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl" /></form></li>';
                        }

                        ?>
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
                        <li class="text-center text-xl sm:text-2xl"><a href="../Course.php">Courses</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="#">Blogs</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../final_compiler/home.php">Programming Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../codeeditor/index.php">Web Design Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="#">Contact</a></li>
                        <?php
                        if (!$_SESSION['User']) {
                            echo '<li><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-lg">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a>
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
                    <div class="w-full bg-[#30559E]  relative"><img src="../Logo/purchase_course_bg.svg" alt="bg-illus" class="hidden md:block absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52">
                        <div class="2xl:relative mx-auto min-h-[590px] max-w-maxScreen grid md:grid-cols-2 grid-cols-1 gap-4 md:gap-0">
                            <div class="flex flex-col gap-4 place-self-center py-14 px-paddingXforMob max-w-[650px] text-[#fff] z-30">
                                <div>
                                    <p class="text-[20px] text-HeroSubText">
                                    <p>Welcome to <strong>@DevTown</strong> Family</p>
                                    </p>
                                    <h1 class="text-[42px] font-bold">MERN Stack <br> Development</h1>
                                </div>
                                <p class="text-[20px] text-HeroSubText">
                                <p>Build fullstack <strong>React.js</strong> applications with <strong>Node.js, Express.js & MongoDB (MERN)</strong> with this <strong>project-focused course</strong>.
                                </p>
                                </p>
                                <div class="flex gap-2 items-center"><span>4.9</span>
                                    <div class="flex gap-1 text-yellow500"><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
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
                            <div class="relative w-full min-h-[200px] px-paddingXforMob bottom-[135px] md:bottom-0">
                                <div class="rounded-2xl xl:mr-[75px] p-4 md:absolute md:bottom-[13rem] lg:bottom-[1.75rem] xl:-bottom-[60px] right-[1rem] min-h-[600px] max-w-[423px] mx-auto md:translate-y-0  translate-y-24 flex flex-col gap-4 bg-[#ffffffc2] border border-grey80 shadow-md shadow-grey100 backdrop-blur-md">
                                    <img src="../Logo/<?php echo $row['image'];?>" class="md:max-w-full w-[400px] min-h-[180px] rounded-2xl overflow-hidden" alt="course image">
                                    <div class="px-4">
                                        <p id="product_name" class="hidden"><?php echo $row['course_name'];?></p>
                                        <div class="text-xl space-x-3 font-semibold mb-3 text-[#000]">₹<span class="text-[#000]" id="amount"><?php echo $row['price'];?></span>
                                        <span class="text-textHead line-through">₹10000</span>
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
                                                    </svg><span>MERN - Beginner to Advanced</span></p>
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
                        <div class="py-10 px-paddingXforMob">
                            <div class="border-b-[1.5px] border-[#00000033]">
                                <div class="mt-16">
                                    <div class="text-[24px] leading-8 font-medium">What you will learn</div>
                                    <div class="grid md:grid-cols-2 grid-cols-1 px-5 py-14 gap-4">
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">HTML, CSS, JavaScript</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Tailwind CSS
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">CSS Animations</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Core JavaScript</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">End to End React.js Application</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">15+ Industry Grade Projects</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">No Pre requisite required</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">End to End Backend with Node.js and Express.js</div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class=""><svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6.90742L6.02241 12L17 1" stroke="#30559E" stroke-width="2"></path>
                                                </svg></div>
                                            <div class="text-[18px]">Building all Project from absolute Scratch</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="_next/static/chunks/pages/index-56c7ea54045c0d2b.js"></script>
                        <script src="_next/static/chunks/823-0ccd09d5872e33ab.js"></script>
                        <script src="_next/static/chunks/pages/about-3bc1b12e60075cde.js"></script>
                        <script src="_next/static/chunks/95b64a6e-6af3ff0511b1462a.js"></script>
                        <script src="_next/static/chunks/6728d85a-74b84972e9ad79d2.js"></script>
                        <script src="_next/static/chunks/1bfc9850-9aca59ce1657dc9a.js"></script>
                        <script src="_next/static/chunks/pages/contact-ce568ec61b04ff81.js"></script>
                        <script src="_next/static/chunks/pages/privacy-policy-8ae97cfbac24ee52.js"></script>
                        <script src="_next/static/chunks/pages/terms-of-use-93f0cc456df30e18.js"></script>
                        <script src="_next/static/chunks/pages/refund-policy-98a3d008d967b7da.js"></script>
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

                            var element = document.getElementById("labs");
                            var compiler = document.getElementById("compiler");

                            element.addEventListener("click", function() {
                                if (compiler.style.display === "block") {
                                    compiler.style.display = "none";
                                } else {
                                    compiler.style.display = "block";
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
                url: '../payment-proccess.php',
                type: 'post',
                // dataType: 'json',
                data: "&product_name=" + product_name + "&amount=" + amount + "&user=" + user + "&email=" + email,
                success: function(msg) {
                    var options = {
                        "key": "rzp_test_uZ1lSqeEpMsKxl",
                        "amount": amount * 100,
                        "name": "DevTown",
                        "description": "Payment",
                        "image": "../Logo/Square_1980x1980.png",
                        "handler": function(response) {
                            console.log(response);
                            jQuery.ajax({
                                url: '../payment-proccess.php',
                                type: 'post',
                                // dataType: 'json',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(msg) {
                                    window.location.href = '../dashboard/index.php';
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
<?php
include('../dashboard/letter_image.php');
include('../dashboard/comment_server.php');
error_reporting(0);
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DevTown About Us</title>
    <!-- <link rel="icon" href="/favicon.ico"> -->
    <!-- <meta name="author" content="Love Babbar">
    <meta name="robots" content="index, follow"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="../Logo/Circle_1980x1980.png" />
    <link rel="stylesheet" href="style.css" />
    <!-- <meta property="og:type" content="website">
    <meta property="og:image" content="https://dgyugonj9a9mu.cloudfront.net/Web_Dev_670f900667_1286d11fc1.jpg">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:image">
    <meta name="title" content="About Us - CodeHelp">
    <meta name="description"
        content="Learn Full Stack Web Development: Master Course · Master Course on Dynamic Programming · Master Course on Graph Algorithms · Complete Android Development.">
    <meta name="keywords"
        content="codehelp, codehelp love babbar, codehelp github, codehelp by babbar, codehelp by love babbar">
    <meta name="copyright" content="Copyright © 2022 CodeHelp. All Rights Reserved.">
    <meta property="og:url" content="https://thecodehelp.vercel.app">
    <meta property="og:title" content="About Us - CodeHelp">
    <meta property="og:description"
        content="Learn Full Stack Web Development: Master Course · Master Course on Dynamic Programming · Master Course on Graph Algorithms · Complete Android Development.">
    <meta property="twitter:url" content="https://thecodehelp.vercel.app">
    <meta property="twitter:title" content="About Us - CodeHelp">
    <meta property="twitter:description"
        content="Learn Full Stack Web Development: Master Course · Master Course on Dynamic Programming · Master Course on Graph Algorithms · Complete Android Development.">
    <meta name="next-head-count" content="20">
    <link rel="manifest" href="/manifest.json"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- <script type="text/javascript" async=""
        src="https://www.gstatic.com/recaptcha/releases/1h-hbVSJRMOQsmO_2qL9cO0z/recaptcha__en.js"
        crossorigin="anonymous"
        integrity="sha384-oPLuJ5GvCPa+xE5+sUj1qdRiz2CRlz7M40INEK/qMfWH71A4aD0cpJwQiZVVdiVm"></script> -->
    <!-- <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-62B40GYL8W&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-80WK7ZEPGT&amp;l=dataLayer&amp;cx=c"></script> -->
    <!-- <script>(function (w, l) { w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' }); })(window, 'dataLayer');</script> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preload" href="/_next/static/css/51edcbcf532ff452.css" as="style"> -->
    <link rel="stylesheet" href="_next/static/css/51edcbcf532ff452.css" data-n-g="">
    <!--<link rel="preload" href="/_next/static/css/f1d5a30b5a4d1378.css" as="style"><noscript data-n-css=""></noscript> -->
    <style data-n-href="/_next/static/css/f1d5a30b5a4d1378.css">
        @font-face {
            font-family: swiper-icons;
            src: url("data:application/font-woff;charset=utf-8;base64, d09GRgABAAAAAAZgABAAAAAADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABGRlRNAAAGRAAAABoAAAAci6qHkUdERUYAAAWgAAAAIwAAACQAYABXR1BPUwAABhQAAAAuAAAANuAY7+xHU1VCAAAFxAAAAFAAAABm2fPczU9TLzIAAAHcAAAASgAAAGBP9V5RY21hcAAAAkQAAACIAAABYt6F0cBjdnQgAAACzAAAAAQAAAAEABEBRGdhc3AAAAWYAAAACAAAAAj//wADZ2x5ZgAAAywAAADMAAAD2MHtryVoZWFkAAABbAAAADAAAAA2E2+eoWhoZWEAAAGcAAAAHwAAACQC9gDzaG10eAAAAigAAAAZAAAArgJkABFsb2NhAAAC0AAAAFoAAABaFQAUGG1heHAAAAG8AAAAHwAAACAAcABAbmFtZQAAA/gAAAE5AAACXvFdBwlwb3N0AAAFNAAAAGIAAACE5s74hXjaY2BkYGAAYpf5Hu/j+W2+MnAzMYDAzaX6QjD6/4//Bxj5GA8AuRwMYGkAPywL13jaY2BkYGA88P8Agx4j+/8fQDYfA1AEBWgDAIB2BOoAeNpjYGRgYNBh4GdgYgABEMnIABJzYNADCQAACWgAsQB42mNgYfzCOIGBlYGB0YcxjYGBwR1Kf2WQZGhhYGBiYGVmgAFGBiQQkOaawtDAoMBQxXjg/wEGPcYDDA4wNUA2CCgwsAAAO4EL6gAAeNpj2M0gyAACqxgGNWBkZ2D4/wMA+xkDdgAAAHjaY2BgYGaAYBkGRgYQiAHyGMF8FgYHIM3DwMHABGQrMOgyWDLEM1T9/w8UBfEMgLzE////P/5//f/V/xv+r4eaAAeMbAxwIUYmIMHEgKYAYjUcsDAwsLKxc3BycfPw8jEQA/gZBASFhEVExcQlJKWkZWTl5BUUlZRVVNXUNTQZBgMAAMR+E+gAEQFEAAAAKgAqACoANAA+AEgAUgBcAGYAcAB6AIQAjgCYAKIArAC2AMAAygDUAN4A6ADyAPwBBgEQARoBJAEuATgBQgFMAVYBYAFqAXQBfgGIAZIBnAGmAbIBzgHsAAB42u2NMQ6CUAyGW568x9AneYYgm4MJbhKFaExIOAVX8ApewSt4Bic4AfeAid3VOBixDxfPYEza5O+Xfi04YADggiUIULCuEJK8VhO4bSvpdnktHI5QCYtdi2sl8ZnXaHlqUrNKzdKcT8cjlq+rwZSvIVczNiezsfnP/uznmfPFBNODM2K7MTQ45YEAZqGP81AmGGcF3iPqOop0r1SPTaTbVkfUe4HXj97wYE+yNwWYxwWu4v1ugWHgo3S1XdZEVqWM7ET0cfnLGxWfkgR42o2PvWrDMBSFj/IHLaF0zKjRgdiVMwScNRAoWUoH78Y2icB/yIY09An6AH2Bdu/UB+yxopYshQiEvnvu0dURgDt8QeC8PDw7Fpji3fEA4z/PEJ6YOB5hKh4dj3EvXhxPqH/SKUY3rJ7srZ4FZnh1PMAtPhwP6fl2PMJMPDgeQ4rY8YT6Gzao0eAEA409DuggmTnFnOcSCiEiLMgxCiTI6Cq5DZUd3Qmp10vO0LaLTd2cjN4fOumlc7lUYbSQcZFkutRG7g6JKZKy0RmdLY680CDnEJ+UMkpFFe1RN7nxdVpXrC4aTtnaurOnYercZg2YVmLN/d/gczfEimrE/fs/bOuq29Zmn8tloORaXgZgGa78yO9/cnXm2BpaGvq25Dv9S4E9+5SIc9PqupJKhYFSSl47+Qcr1mYNAAAAeNptw0cKwkAAAMDZJA8Q7OUJvkLsPfZ6zFVERPy8qHh2YER+3i/BP83vIBLLySsoKimrqKqpa2hp6+jq6RsYGhmbmJqZSy0sraxtbO3sHRydnEMU4uR6yx7JJXveP7WrDycAAAAAAAH//wACeNpjYGRgYOABYhkgZgJCZgZNBkYGLQZtIJsFLMYAAAw3ALgAeNolizEKgDAQBCchRbC2sFER0YD6qVQiBCv/H9ezGI6Z5XBAw8CBK/m5iQQVauVbXLnOrMZv2oLdKFa8Pjuru2hJzGabmOSLzNMzvutpB3N42mNgZGBg4GKQYzBhYMxJLMlj4GBgAYow/P/PAJJhLM6sSoWKfWCAAwDAjgbRAAB42mNgYGBkAIIbCZo5IPrmUn0hGA0AO8EFTQAA");
            font-weight: 400;
            font-style: normal
        }
    </style>
    <script defer="" nomodule="" src="_next/static/chunks/polyfills-0d1b80a048d4787e.js"></script>
    <script src="_next/static/chunks/webpack-df4cf1c8d23aa877.js" defer=""></script>
    <script src="_next/static/chunks/framework-4556c45dd113b893.js" defer=""></script>
    <script src="_next/static/chunks/main-572b913902beb9f3.js" defer=""></script>
    <script src="_next/static/chunks/pages/_app-7f0c41f953d8260e.js" defer=""></script>
    <script src="_next/static/chunks/de71a805-4786b08b982e7a22.js" defer=""></script>
    <script src="_next/static/chunks/706-bbfcca55e6b38d6b.js" defer=""></script>
    <script src="_next/static/chunks/pages/index-56c7ea54045c0d2b.js" defer=""></script>
    <script src="_next/static/dyiThjJPp9sUzmF5QInqN/_buildManifest.js" defer=""></script>
    <script src="_next/static/dyiThjJPp9sUzmF5QInqN/_ssgManifest.js" defer=""></script>
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
    <style>
        .Typewriter__cursor {
            -webkit-animation: Typewriter-cursor 1s infinite;
            animation: Typewriter-cursor 1s infinite;
            margin-left: 1px
        }

        @-webkit-keyframes Typewriter-cursor {
            0% {
                opacity: 0
            }

            50% {
                opacity: 1
            }

            100% {
                opacity: 0
            }
        }

        @keyframes Typewriter-cursor {
            0% {
                opacity: 0
            }

            50% {
                opacity: 1
            }

            100% {
                opacity: 0
            }
        }
    </style>
    <link as="script" rel="prefetch" href="_next/static/chunks/d0c16330-043b3112f1553c69.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/d64684d8-6bb0517872081b93.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/823-0ccd09d5872e33ab.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/pages/about-3bc1b12e60075cde.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/95b64a6e-6af3ff0511b1462a.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/6728d85a-74b84972e9ad79d2.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/1bfc9850-9aca59ce1657dc9a.js">
    <link as="script" rel="prefetch" href="_next/static/chunks/pages/contact-ce568ec61b04ff81.js">
    <style data-emotion="css-global" data-s=""></style>
    <style data-emotion="css-global" data-s=""></style>
    <style data-emotion="css-global" data-s=""></style>
    <style data-emotion="css-global" data-s=""></style>
    <style data-emotion="css-global" data-s=""></style>
    <style data-emotion="css" data-s=""></style>
</head>

<body style="overflow: unset; -webkit-tap-highlight-color: transparent;">
    <!-- data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0"  -->
    <div id="__next">
        <div class="overflow-hidden animate-opacityanim bg-[#fff]">
            <div class="fixed z-[9999] w-full">
                <!-- Navbar -->
                <nav class="navbar h-16 sm:h-20 backdrop-blur-sm" style="box-shadow: rgba(157, 157, 157, 0.3) 0 4px 10px">
                    <ul class="flex justify-between items-center">
                        <li class="flex justify-center items-center">
                            <a href="../index.php"><img src="../Logo/Circle_1980x1980.png" alt="DevTown" class="w-14 m-1 p-1 sm:w-[74px]" /></a>
                            <p class="text-3xl sm:text-[40px] text-[#30559E]" style="font-family: 'Lobster', cursive;">
                                DevTown
                            </p>
                        </li>
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="about.php">About us</a></li>
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
                                        <li class="text-sm px-5 pt-5 text-gray-600"><a href="../final_compiler/home.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Programming Compiler</span><br><span>Write and run code in multiple <br>programming language from anywhere.</span></a></li>
                                        <li class="text-sm p-5 text-gray-600"><a href="../codeeditor/index.php"><span class="text-xl font-medium text-gray-700 hover:text-black">Web Designing</span><br><span>Write and run code for Web <br>Designing from anywhere.</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl">Blog</li>
                        <li class="flex justify-center items-center hidden lg:block lg:text-xl xl:text-2xl"><a href="../contact/contact.php">Contact</a></li>
                        <!-- <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl "><a href="final_compiler/home.php" class="list-none">Compiler</a></li> -->
                        <?php
                        if (!$_SESSION['User']) {
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="../login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="../Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
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
                                        <img src="../Logo/dashboard.svg" alt="" class="w-7">
                                        <h1 class="text-lg font-medium text-gray-700 hover:text-gray-950">Dashboard</h1>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard/my_courses.php" class="hover:bg-gray-500">
                                    <div class="flex justify-center items-center gap-3 pb-3">
                                        <img src="../Logo/profile.svg" alt="" class="w-8">
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
                                        <img src="../Logo/power.svg" alt="" class="w-7">
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
                        <li class="text-center text-xl sm:text-2xl"><a href="about.php">About Us</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../Course.php">Courses</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="">Blogs</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../final_compiler/home.php">Programming Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../codeeditor/index.php">Web Design Compiler</a></li>
                        <li class="text-center text-xl sm:text-2xl"><a href="../contact/contact.php">Contact</a></li>
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
        <div class="animate__animated animate__fadeIn animate__faster absolute top-full left-0 right-0 z-[9998] backdrop-blur-lg pt-[10vh] pb-[8vh] font-rubik md:hidden  pointer-events-none hidden opacity-0 transition-all duration-300" style="background-color: rgba(255, 255, 255, 0.25); box-shadow: rgba(157, 157, 157, 0.2) 0px 4px 10px;">
            <ul class="flex flex-col items-center gap-y-6 md:hidden select-none">
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="about.php">About Us</a>
                </li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="../Course.php">Courses</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="../final_compiler/home.php">Programming Compiler</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="../codeeditor/index.php">Web Design Compiler</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="../contact/contact.php">Contact</a></li>
            </ul>
            <div class="mt-6 flex w-full flex-col items-center justify-center gap-x-2 md:hidden"><a target="_blank" class="cursor-pointer py-2 px-9 place-items-center rounded-md xl:text-lg bg-[#fff] text-lg" href="https://learn.thecodehelp.in/s/dashboard">Dashboard</a><a target="_blank" href="https://learn.thecodehelp.in/s/dashboard"><button class="focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 
      cursor-pointer
      rounded-md bg-brand text-[#fff] border-brand font-rubik xl:text-lg text-sm border mt-6 py-2 px-11 text-lg flex items-center">Login <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="ml-2 text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" y1="12" x2="3" y2="12"></line>
                        </svg></button></a></div>
        </div>
    </div>
    <div class="mt-[85px]">
        <div class="animate__animated animate__fadeIn animate__fast font-rubik ">
            <div class="w-full bg-[#30559E]  relative -mt-5 sm:-mt-0">
                <div class="absolute bottom-0 right-0">
                    <!--    <img
                                src="../Logo/dot.svg" alt="dotted_illus"> -->
                </div><img src="../Logo/purchase_course_bg.svg" alt="bg-illus" class="hidden md:block absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52">
                <div class="2xl:relative mx-auto grid min-h-[590px] max-w-maxScreen md:grid-cols-2 grid-cols-1">
                    <div class="hidden md:block absolute top-0 right-0 z-30 w-full h-full overflow-hidden">
                        <div class="absolute bottom-0 right-0 xl:w-[600px] w-[500px] xl:h-[600px] h-[500px] overflow-hidden">
                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img alt="hero_img" src="../Logo/12063795_4884785.jpg" decoding="async" data-nimg="fill" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;" sizes="100vw"><noscript></noscript></span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 place-self-center md:p-5 px-paddingXforMob text-[#fff] z-30">
                        <p class="text-[42px] font-bold">A platform for the next generation of learners!</p>
                        <p class="text-[20px] text-HeroSubText">Place for imparting education to next-generation
                            students.</p>
                        <div class="flex gap-2 items-center"><span>4.7</span><span class="flex gap-1"><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="text-yellow500 text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                    </path>
                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="text-yellow500 text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                    </path>
                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="text-yellow500 text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                    </path>
                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="text-yellow500 text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                    </path>
                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" class="text-yellow500 text-lg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                    </path>
                                </svg></span></div>
                        <div class="flex gap-5 text-lg">
                            <p class="flex gap-2 items-center"> <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                    </path>
                                </svg> Engilsh / Hindi</p>
                            <p class="flex gap-1 items-center"> <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <desc></desc>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z">
                                    </path>
                                    <rect x="3" y="6" width="12" height="12" rx="2"></rect>
                                </svg> 10+ courses</p>
                        </div>
                        <div><button class="focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 
      cursor-pointer
      place-items-center rounded-md border xl:text-lg text-sm border-brand bg-white100 text-brand100 px-6 py-[0.5rem] text-[#000]"><a href="../Course.php">Start Learning</a></button></div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="mx-auto my-10 grid min-h-[564px] max-w-maxScreen px-paddingXforMob md:grid-cols-2 md:px-4">
                    <img src="../Logo/Square_1980x1980.png" alt="img" class="-pt-1 mx-auto h-[80vw] w-[80vw] place-self-center rounded-3xl object-cover object-top sm:h-[475px] sm:w-[80%] sm:rounded-3xl md:w-[600px] md:h-[400px] lg:h-[540px] xl:h-[600px]">
                    <div class="flex flex-col items-center justify-center gap-4 px-4 py-10 md:items-start md:px-12 lg:px-20">
                        <p class="section_heading text-headText">About us</p>
                        <p class="section_subheading text-center md:text-start text-subText ">Hello! Welcome to
                            <span class="font-medium">DevTown</span>, an e-learning platform dedicated to providing computer science students with top-quality, accessible education.
                        </p>
                        <p class="content_text text-justify md:text-start text-grey100">At DevTown, we understand the unique needs and challenges faced by computer science students. That's why we offer a wide range of courses across various computer science disciplines, including programming, web development, Datastructures & Algorithms, Operating Systems, and more. Our courses are designed and taught by experienced instructors who bring real-world expertise to the classroom.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="relative">
                        <div class="mx-auto my-10 grid h-fit max-w-maxScreen px-paddingXforMob md:grid-cols-2"><img
                                src="https://cdn.thecodehelp.in/w7yldvvwkigvu8tbhtua_a8be125c66.webp" alt="img"
                                class="mx-auto block h-[80vw] w-[80vw] rounded-full object-cover sm:h-[500px] sm:w-full sm:rounded-3xl md:hidden">
                            <div
                                class="flex flex-col items-center justify-center gap-4 px-4 py-10 pr-0 md:items-start md:px-0 md:pr-12 lg:pr-20">
                                <p class="section_heading text-headText text-center md:text-start">Our Story</p>
                                <p class="section_subheading text-subText text-center md:text-start">At <span
                                        class="font-medium">Code Help</span>, we aim to provide new students with <span
                                        class="font-medium">proper mentorship and education</span> for their learning
                                    and growth.</p>
                                <p class="content_text text-grey100 text-justify md:text-start"><span
                                        class="font-medium">Code Help</span> was founded in 2020 by <span
                                        class="font-medium">Love Babbar (Ex-Amazon, Ex-Microsoft)</span> to deliver “to
                                    the point, short and practical” educational content for learning programming,
                                    coding, and preparing for <span class="font-medium">job placements, and
                                        interviews</span>. He has been mentoring students through his Youtube channel
                                    which has now gained more than <span class="font-medium">17 million views</span> and
                                    is now looking forward to providing his guidance in different courses through <span
                                        class="font-medium">Code Help</span>.</p>
                            </div><img src="https://cdn.thecodehelp.in/w7yldvvwkigvu8tbhtua_a8be125c66.webp" alt="img"
                                class="hidden md:block mx-auto h-[80vw] w-[80vw] place-self-center rounded-full object-cover object-top sm:h-[500px] sm:w-full sm:rounded-3xl md:w-[660px] lg:h-[564px]">
                        </div>
                    </div> -->
            <!-- <div class="relative mx-auto max-w-maxScreen ">
                        <div
                            class="absolute -top-20 -left-20 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]">
                        </div>
                        <div
                            class="flex flex-row items-center justify-between px-paddingXforMob py-4 pb-0 md:px-16 md:py-14">
                            <div class="max-w-[52rem] space-y-3 py-6 font-rubik md:py-0">
                                <p class="md:section_heading text-3xl false font-bold md:text-[42px] md:font-semibold">
                                    Our Instructor</p>
                                <p class="section_subheading text-subText">A mentor is someone confident enough with
                                    their experiences and knowledge in a particular topic or set of topics, to
                                    comfortably assist others with less experience or knowledge.</p>
                            </div>
                            <div class="hidden flex-row gap-4 md:flex "><button
                                    class="grid h-10 w-20 place-content-center rounded-full bg-grey50 text-[#222] text-xl"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                                        </path>
                                    </svg></button><button
                                    class="grid h-10 w-20 place-content-center rounded-full bg-brand  text-xl text-[#fff]"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                        </path>
                                    </svg></button></div>
                        </div>
                        <div class="mx-auto mb-16 h-[2px] w-[90%] bg-white100 md:mb-24 false "></div>
                        <div
                            class="swiper swiper-initialized swiper-horizontal swiper-pointer-events mySwiper swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-828779f6bace7bf3" aria-live="off"
                                style="transform: translate3d(-2586px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="1" role="group" aria-label="2 / 2"
                                    style="width: 832px; margin-right: 30px;">
                                    <div
                                        class="flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center undefined">
                                        <span
                                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                                    alt="" aria-hidden="true"
                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27320%27%20height=%27374%27/%3e"
                                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                                alt="instructor_img"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                decoding="async" data-nimg="intrinsic" class="rounded-2xl"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                        <div class="md:max-w-[70%] space-y-6 text-center md:text-start">
                                            <div>
                                                <p class="section_heading text-textHead">Lakshay Kumar</p>
                                                <p class="section_subheading text-textHead">CS @Adobe, Instructor
                                                    @Code-Help</p>
                                            </div>
                                            <p class="content_text pr-5 text-justify text-[#a6a6a6]">
                                            <p>Lakshay Kumar is an ace software engineer working in the role of
                                                <strong>Computer Scientist</strong> at <strong>Adobe Systems</strong>
                                                and a popular computer science instructor on <strong>CodeHelp</strong>
                                                Youtube.
                                                He is working in the industry for the past <strong>3.5 years</strong>,
                                                working on different real-world problems. He is well-known among
                                                students for his amazingly simplified explanations with real-life
                                                examples, enabling students to understand complex topics very easily.
                                                Many of his ex-students are now working in top product companies like
                                                <strong>Microsoft, Amazon, De-Shaw</strong> etc.
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 2"
                                    style="width: 832px; margin-right: 30px;">
                                    <div
                                        class="flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center undefined">
                                        <span
                                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                                    alt="" aria-hidden="true"
                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27320%27%20height=%27374%27/%3e"
                                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                                alt="instructor_img"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                decoding="async" data-nimg="intrinsic" class="rounded-2xl"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                        <div class="md:max-w-[70%] space-y-6 text-center md:text-start">
                                            <div>
                                                <p class="section_heading text-textHead">Love Babbar</p>
                                                <p class="section_subheading text-textHead">Founder - Code-Help,
                                                    Ex-Amazon, Ex-Microsoft</p>
                                            </div>
                                            <p class="content_text pr-5 text-justify text-[#a6a6a6]">
                                            <p>Love Babbar is a <strong>Software Engineer</strong> and a Youtuber,
                                                primarily known for his Coding and Software Engineering skills. He is
                                                quite a popular figure among students as well as working professionals
                                                on various social media platforms, his YouTube and LinkedIn profiles
                                                amassing almost <strong>1M subscribers</strong>. He's also mentored
                                                <strong>500k+ students</strong> so far. He has done his B.Tech (IT) from
                                                the Netaji Subhash Institute of Technology (NSIT), Delhi, and worked in
                                                <strong>Amazon</strong> and <strong>Microsoft</strong>.
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate-active swiper-slide-prev swiper-slide-duplicate-next"
                                    data-swiper-slide-index="1" role="group" aria-label="2 / 2"
                                    style="width: 832px; margin-right: 30px;">
                                    <div
                                        class="flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center undefined">
                                        <span
                                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                                    alt="" aria-hidden="true"
                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27320%27%20height=%27374%27/%3e"
                                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                                alt="instructor_img"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                decoding="async" data-nimg="intrinsic" class="rounded-2xl"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                        <div class="md:max-w-[70%] space-y-6 text-center md:text-start">
                                            <div>
                                                <p class="section_heading text-textHead">Lakshay Kumar</p>
                                                <p class="section_subheading text-textHead">CS @Adobe, Instructor
                                                    @Code-Help</p>
                                            </div>
                                            <p class="content_text pr-5 text-justify text-[#a6a6a6]">
                                            <p>Lakshay Kumar is an ace software engineer working in the role of
                                                <strong>Computer Scientist</strong> at <strong>Adobe Systems</strong>
                                                and a popular computer science instructor on <strong>CodeHelp</strong>
                                                Youtube.
                                                He is working in the industry for the past <strong>3.5 years</strong>,
                                                working on different real-world problems. He is well-known among
                                                students for his amazingly simplified explanations with real-life
                                                examples, enabling students to understand complex topics very easily.
                                                Many of his ex-students are now working in top product companies like
                                                <strong>Microsoft, Amazon, De-Shaw</strong> etc.
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-active"
                                    data-swiper-slide-index="0" role="group" aria-label="1 / 2"
                                    style="width: 832px; margin-right: 30px;">
                                    <div
                                        class="flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center undefined">
                                        <span
                                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                                    alt="" aria-hidden="true"
                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27320%27%20height=%27374%27/%3e"
                                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                                alt="instructor_img"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                decoding="async" data-nimg="intrinsic" class="rounded-2xl"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                        <div class="md:max-w-[70%] space-y-6 text-center md:text-start">
                                            <div>
                                                <p class="section_heading text-textHead">Love Babbar</p>
                                                <p class="section_subheading text-textHead">Founder - Code-Help,
                                                    Ex-Amazon, Ex-Microsoft</p>
                                            </div>
                                            <p class="content_text pr-5 text-justify text-[#a6a6a6]">
                                            <p>Love Babbar is a <strong>Software Engineer</strong> and a Youtuber,
                                                primarily known for his Coding and Software Engineering skills. He is
                                                quite a popular figure among students as well as working professionals
                                                on various social media platforms, his YouTube and LinkedIn profiles
                                                amassing almost <strong>1M subscribers</strong>. He's also mentored
                                                <strong>500k+ students</strong> so far. He has done his B.Tech (IT) from
                                                the Netaji Subhash Institute of Technology (NSIT), Delhi, and worked in
                                                <strong>Amazon</strong> and <strong>Microsoft</strong>.
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 1" aria-current="true"></span><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 2"></span>
                            </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div> -->
            <!-- <div class="relative mx-auto max-w-maxScreen ">
                        <div
                            class="absolute -top-20 -left-20 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]">
                        </div>
                        <div class="flex flex-row items-center justify-between px-6 py-4 pb-0 md:px-16 md:py-14">
                            <div class="py-6 font-rubik md:py-0">
                                <p class="pre_heading mb-2 text-brand">What student says</p>
                                <p
                                    class="md:section_heading text-3xl font-bold md:text-[42px] md:font-semibold text-headText">
                                    Recent Reviews</p>
                            </div>
                            <div class="hidden flex-row gap-4 md:flex "><button
                                    class="grid h-10 w-20 place-content-center rounded-full bg-grey50 text-[#222] text-xl"
                                    aria-label="Previous"><svg stroke="currentColor" fill="currentColor"
                                        stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                                        </path>
                                    </svg></button><button
                                    class="grid h-10 w-20 place-content-center rounded-full bg-brand  text-xl text-[#fff]"
                                    aria-label="Next"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                        </path>
                                    </svg></button></div>
                        </div>
                        <div class="mx-auto select-none mb-16 h-[2px] w-[90%] bg-white100 md:mb-24 false"></div>
                        <div
                            class="swiper swiper-initialized swiper-horizontal swiper-pointer-events mySwiper swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-18b13cbc1ab69d36" aria-live="off"
                                style="transform: translate3d(-2218.67px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2"
                                    role="group" aria-label="3 / 4" style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            It is completely beginner friendly, no need of hesitation if you have no
                                            knowledge of code. From nothing to a confident coder, it is all you need. I
                                            highly recommend this to every fresher and also to someone who has even the
                                            smallest doubt.</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Bhoomi Vaswani</span><span
                                                        class="text-xs text-subText text-center md:text-start">DSA
                                                        Batch</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                    data-swiper-slide-index="3" role="group" aria-label="4 / 4"
                                    style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            During entire session it is mandatory that we should Practice more questions
                                            rather than theory so that work is superbly done by Babbar bhaiya</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Swastik Vasistha</span><span
                                                        class="text-xs text-subText text-center md:text-start">DSA
                                                        Course</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.855 20.966c-.224 0-.443-.05-.646-.146l-.104-.051-4.107-2.343-4.107 2.344-.106.053c-.488.228-1.085.174-1.521-.143-.469-.34-.701-.933-.586-1.509l.957-4.642-1.602-1.457-1.895-1.725-.078-.082c-.375-.396-.509-.97-.34-1.492.173-.524.62-.912 1.16-1.009l.102-.018 4.701-.521 1.946-4.31.06-.11c.262-.473.764-.771 1.309-.771.543 0 1.044.298 1.309.77l.06.112 1.948 4.312 4.701.521.104.017c.539.1.986.486 1.158 1.012.17.521.035 1.098-.34 1.494l-.078.078-3.498 3.184.957 4.632c.113.587-.118 1.178-.59 1.519-.252.182-.556.281-.874.281zm-8.149-6.564c-.039.182-.466 2.246-.845 4.082l3.643-2.077c.307-.175.684-.175.99 0l3.643 2.075-.849-4.104c-.071-.346.045-.705.308-.942l3.1-2.822-4.168-.461c-.351-.039-.654-.26-.801-.584l-1.728-3.821-1.726 3.821c-.146.322-.45.543-.801.584l-4.168.461 3.1 2.822c.272.246.384.617.302.966z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 4"
                                    style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            It was a great experience having love Babbar sir as a mentor. Thank you sir
                                            for teaching DSA concepts in a graspable manner and supporting us throughout
                                            the course</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Akhil Sharma</span><span
                                                        class="text-xs text-subText text-center md:text-start">Interview
                                                        Preparation Batch</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" role="group"
                                    aria-label="2 / 4" style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            This is the best course out there to learn recursion and backtracking
                                            concepts intuitively from scratch, Bhaiya is a wonderfully teacher and
                                            teaches from the basics, explaining every problem in detail including
                                            Leetcode Hard problems, highly recommend</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Anagh Kanungo</span><span
                                                        class="text-xs text-subText text-center md:text-start">Recursion
                                                        and Backtracking</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" role="group"
                                    aria-label="3 / 4" style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            It is completely beginner friendly, no need of hesitation if you have no
                                            knowledge of code. From nothing to a confident coder, it is all you need. I
                                            highly recommend this to every fresher and also to someone who has even the
                                            smallest doubt.</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Bhoomi Vaswani</span><span
                                                        class="text-xs text-subText text-center md:text-start">DSA
                                                        Batch</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="3" role="group"
                                    aria-label="4 / 4" style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            During entire session it is mandatory that we should Practice more questions
                                            rather than theory so that work is superbly done by Babbar bhaiya</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Swastik Vasistha</span><span
                                                        class="text-xs text-subText text-center md:text-start">DSA
                                                        Course</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.855 20.966c-.224 0-.443-.05-.646-.146l-.104-.051-4.107-2.343-4.107 2.344-.106.053c-.488.228-1.085.174-1.521-.143-.469-.34-.701-.933-.586-1.509l.957-4.642-1.602-1.457-1.895-1.725-.078-.082c-.375-.396-.509-.97-.34-1.492.173-.524.62-.912 1.16-1.009l.102-.018 4.701-.521 1.946-4.31.06-.11c.262-.473.764-.771 1.309-.771.543 0 1.044.298 1.309.77l.06.112 1.948 4.312 4.701.521.104.017c.539.1.986.486 1.158 1.012.17.521.035 1.098-.34 1.494l-.078.078-3.498 3.184.957 4.632c.113.587-.118 1.178-.59 1.519-.252.182-.556.281-.874.281zm-8.149-6.564c-.039.182-.466 2.246-.845 4.082l3.643-2.077c.307-.175.684-.175.99 0l3.643 2.075-.849-4.104c-.071-.346.045-.705.308-.942l3.1-2.822-4.168-.461c-.351-.039-.654-.26-.801-.584l-1.728-3.821-1.726 3.821c-.146.322-.45.543-.801.584l-4.168.461 3.1 2.822c.272.246.384.617.302.966z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0"
                                    role="group" aria-label="1 / 4" style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            It was a great experience having love Babbar sir as a mentor. Thank you sir
                                            for teaching DSA concepts in a graspable manner and supporting us throughout
                                            the course</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Akhil Sharma</span><span
                                                        class="text-xs text-subText text-center md:text-start">Interview
                                                        Preparation Batch</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="1" role="group" aria-label="2 / 4"
                                    style="width: 554.667px;">
                                    <div
                                        class="w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10  bg-[#fff]">
                                        <p
                                            class="text-subText min-h-[200px] text-justify  md:min-h-[150px] md:text-start">
                                            This is the best course out there to learn recursion and backtracking
                                            concepts intuitively from scratch, Bhaiya is a wonderfully teacher and
                                            teaches from the basics, explaining every problem in detail including
                                            Leetcode Hard problems, highly recommend</p>
                                        <div class="flex md:flex-row flex-col items-center justify-between ">
                                            <div class="flex md:flex-row flex-col items-center gap-2">
                                                <div
                                                    class="h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100">
                                                    <span
                                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                                            alt="author img"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                            decoding="async" data-nimg="responsive"
                                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript></span>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center md:items-start items-center gap-2 mb-2">
                                                    <span class="text-sm font-bold false">Anagh Kanungo</span><span
                                                        class="text-xs text-subText text-center md:text-start">Recursion
                                                        and Backtracking</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 text-yellow500"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" version="1.2"
                                                    baseProfile="tiny" viewBox="0 0 24 24" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    version="1.2" baseProfile="tiny" viewBox="0 0 24 24" height="1em"
                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.1 11.3l3.6 3.3-1 4.6c-.1.6.1 1.2.6 1.5.2.2.5.3.8.3.2 0 .4 0 .6-.1 0 0 .1 0 .1-.1l4.1-2.3 4.1 2.3s.1 0 .1.1c.5.2 1.1.2 1.5-.1.5-.3.7-.9.6-1.5l-1-4.6c.4-.3 1-.9 1.6-1.5l1.9-1.7.1-.1c.4-.4.5-1 .3-1.5s-.6-.9-1.2-1h-.1l-4.7-.5-1.9-4.3s0-.1-.1-.1c-.1-.7-.6-1-1.1-1-.5 0-1 .3-1.3.8 0 0 0 .1-.1.1l-1.9 4.3-4.7.5h-.1c-.5.1-1 .5-1.2 1-.1.6 0 1.2.4 1.6z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet"
                                    tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 3" aria-current="true"></span><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 4"></span>
                            </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div> -->
            <!-- <div class="bg-section_bg">
                        <div class="mx-auto max-w-maxScreen px-paddingXforMob py-16">
                            <div class="pb-16 text-center">
                                <p class="section_heading text-headText">Get in Touch</p>
                                <p class="section_subheading text-subText ">The Ultimate Guide To Ace SDE Interviews.
                                </p>
                            </div>
                            <div>
                                <div class="bg-[#fff] px-10 py-12">
                                    <div
                                        class="flex sm:flex-row flex-col justify-between items-center sm:text-4xl text-2xl mb-14">
                                        <p class="font-bold text-center false">Send us a message</p>
                                        <div class="text-brand"><svg stroke="currentColor" fill="none" stroke-width="0"
                                                viewBox="0 0 24 24" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg></div>
                                    </div>
                                    <form name="contact-form" method="post">
                                        <div class="grid gap-8 md:grid-cols-2 grid-cols-1 mb-8">
                                            <div class="MuiFormControl-root css-13sljp9"><label
                                                    class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard MuiFormLabel-colorPrimary MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard css-18pwnd5"
                                                    data-shrink="false" for="name">Name</label>
                                                <div required=""
                                                    class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-colorPrimary MuiInputBase-formControl css-1pjfezo">
                                                    <input aria-invalid="false" id="name" name="name" required=""
                                                        type="text" class="MuiInputBase-input MuiInput-input css-mnn31"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="MuiFormControl-root css-13sljp9"><label
                                                    class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard MuiFormLabel-colorPrimary MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard css-18pwnd5"
                                                    data-shrink="false" for="email">Email Address</label>
                                                <div required=""
                                                    class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-colorPrimary MuiInputBase-formControl css-1pjfezo">
                                                    <input aria-invalid="false" id="email" name="email" required=""
                                                        type="text" class="MuiInputBase-input MuiInput-input css-mnn31"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="MuiFormControl-root css-13sljp9"><label
                                                    class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard MuiFormLabel-colorPrimary MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard css-18pwnd5"
                                                    data-shrink="false" for="phoneNo">Phone Number</label>
                                                <div required=""
                                                    class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-colorPrimary MuiInputBase-formControl css-1pjfezo">
                                                    <input aria-invalid="false" id="phoneNo" name="phoneNo" required=""
                                                        type="tel" class="MuiInputBase-input MuiInput-input css-mnn31"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="MuiFormControl-root css-13sljp9"><label
                                                    class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard MuiFormLabel-colorPrimary MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard css-18pwnd5"
                                                    data-shrink="false" for="subject">Subject</label>
                                                <div required=""
                                                    class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-colorPrimary MuiInputBase-formControl css-1pjfezo">
                                                    <input aria-invalid="false" id="subject" name="subject" required=""
                                                        type="text" class="MuiInputBase-input MuiInput-input css-mnn31"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid">
                                            <div class="MuiFormControl-root css-13sljp9"><label
                                                    class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard MuiFormLabel-colorPrimary MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-standard css-18pwnd5"
                                                    data-shrink="false" for="message">Message</label>
                                                <div required=""
                                                    class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-colorPrimary MuiInputBase-formControl css-1pjfezo">
                                                    <input aria-invalid="false" id="message" name="message" required=""
                                                        type="text" class="MuiInputBase-input MuiInput-input css-mnn31"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex mx-auto flex-col lg:flex-row items-center justify-between mt-8 md:mt-8">
                                            <div>
                                                <div>
                                                    <div>
                                                        <div style="width: 304px; height: 78px;">
                                                            <div><iframe title="reCAPTCHA"
                                                                    src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld51bQjAAAAAIlbrh4zi-mIxM93_fAD_UCawU54&amp;co=aHR0cHM6Ly93d3cudGhlY29kZWhlbHAuaW46NDQz&amp;hl=en&amp;type=image&amp;v=1h-hbVSJRMOQsmO_2qL9cO0z&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=m7rq9j67y9g5"
                                                                    width="304" height="78" role="presentation"
                                                                    name="a-rr627tx2e9r6" frameborder="0" scrolling="no"
                                                                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe>
                                                            </div><textarea id="g-recaptcha-response"
                                                                name="g-recaptcha-response" class="g-recaptcha-response"
                                                                style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                        </div><iframe style="display: none;"></iframe>
                                                    </div>
                                                </div><span class="text-[#f00] text-[0.85rem] font-extralight"></span>
                                            </div>
                                            <div
                                                class="flex mt-2 lg:mt-0 md:flex-row-reverse md:justify-start justify-center">
                                                <button
                                                    class="focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2 
      cursor-pointer
      rounded-md bg-brand text-[#fff] border-brand font-rubik xl:text-lg text-sm border px-6 h-12 py-2 flex items-center gap-3 xl:text-xl text-lg lg:h-[4rem]">Submit<svg
                                                        stroke="currentColor" fill="none" stroke-width="2"
                                                        viewBox="0 0 24 24" stroke-linecap="round"
                                                        stroke-linejoin="round" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <desc></desc>
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                                        <path
                                                            d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                                                        </path>
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
        </div>
    </div>
    <!-- <footer class="relative min-h-[280px] w-full overflow-hidden bg-brand text-[#fff] py-8 px-8 font-rubik"><img
                    src="https://cdn.thecodehelp.in/ggcp5ffn7v6vdnrrd53d_e563995c50.svg" alt="bg-illus"
                    class="absolute top-0 left-0 z-[-1] h-[15vh] w-[100vw] object-cover"><img
                    src="https://cdn.thecodehelp.in/llyckc8wjy60b9bg3i8h_5f5a528b6d.svg" alt="dotted_illus"
                    class="absolute bottom-0 right-0">
                <div class="max-w-maxScreen mx-auto">
                    <div class=" flex flex-col items-center gap-4 md:flex-row md:justify-around md:gap-0 mb-10">
                        <div class="flex flex-col px-4 text-center md:text-start">
                            <div class="mx-auto mb-4 h-16 w-20 md:mx-0"><span
                                    style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><span
                                        style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 100% 0px 0px;"></span><img
                                        alt="CodeHelp Logo"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        decoding="async" data-nimg="responsive" class="w-fit"
                                        style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; background-size: cover; background-position: 0% 0%; filter: blur(20px); background-image: url(&quot;https://cdn.thecodehelp.in/hoktffneuv795jansa8z_bdff2537c7.svg&quot;);"><noscript></noscript></span>
                            </div>
                            <h2 class="text-xl font-bold uppercase">Code Help</h2>
                            <p class="mt-4 text-base max-w-[300px]">The Ultimate Guide To Ace SDE Interviews.</p>
                        </div>
                        <div class="flex flex-col text-start text-base">
                            <p class="mb-6 font-bold uppercase text-center md:text-left">menu</p>
                            <div class="flex flex-col gap-y-2"><a href="/about">About Us</a><a
                                    href="/#courses">Courses</a><a target="_blank"
                                    href="https://labs.thecodehelp.in">Labs</a><a href="/contact">Contact</a></div>
                        </div>
                        <div class="flex flex-col text-start text-base">
                            <p class="mb-6 font-bold uppercase text-center md:text-left">services</p>
                            <div class="flex flex-col gap-y-2"><a class="" href="/privacy-policy">Privacy Policy</a><a
                                    class="" href="/terms-of-use">Terms of use</a><a class=""
                                    href="/refund-policy">Refund Policy</a></div>
                        </div>
                        <div class="hidden h-[190px] w-[1px] bg-[#fff] md:block"></div>
                        <div class="flex flex-col text-base md:text-start">
                            <p class="mb-6 font-bold uppercase text-center md:text-left">GET IN TOUCH</p>
                            <p>Email: <a href="mailto:support@codehelp.in">support@codehelp.in</a></p>
                        </div>
                    </div>
                    <div class="mt-4 text-base text-center border-t border-brColor pt-10">Copyright © 2023 CodeHelp. All
                        Rights Reserved.</div>
                </div>
            </footer> -->
    <footer class="px-4 divide-y bg-[#759DEA]">
        <div class="container flex flex-col justify-between py-10 mx-auto space-y-8 lg:flex-row lg:space-y-0">
            <div class="lg:w-1/3">
                <a rel="" href="../index.php" class="flex justify-center space-x-3 lg:justify-center lg:mt-10">
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
                            <a rel="noopener noreferrer" href="../contact.php">Contact Us</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="../Course.php">Courses</a>
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
                            <a rel="noopener noreferrer" href="../final_compiler/home.php">Programming</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="../codeeditor/index.php">Web Design</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="py-6 text-sm text-center text-white sm:text-lg xl:text-2xl">Copyright © 2023 DevTown. <br> All rights
            reserved.</div>
    </footer>
    </div>
    </div>
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NHFSJ5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <script src="https://www.googletagmanager.com/gtm.js?id=GTM-5NHFSJ5" data-nscript="afterInteractive"></script>
    <next-route-announcer>
        <p aria-live="assertive" id="__next-route-announcer__" role="alert"
            style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap; overflow-wrap: normal;">
            About Us - CodeHelp</p>
    </next-route-announcer> -->
    <script src="_next/static/chunks/d0c16330-043b3112f1553c69.js"></script>
    <script src="_next/static/chunks/d64684d8-6bb0517872081b93.js"></script>
    <script src="_next/static/chunks/823-0ccd09d5872e33ab.js"></script>
    <script src="_next/static/chunks/pages/about-3bc1b12e60075cde.js"></script>
    <script src="_next/static/chunks/95b64a6e-6af3ff0511b1462a.js"></script>
    <script src="_next/static/chunks/6728d85a-74b84972e9ad79d2.js"></script>
    <script src="_next/static/chunks/1bfc9850-9aca59ce1657dc9a.js"></script>
    <script src="_next/static/chunks/pages/contact-ce568ec61b04ff81.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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
    </script>
    <!-- <div
        style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
        <div
            style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;">
        </div>
        <div class="g-recaptcha-bubble-arrow"
            style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;">
        </div>
        <div class="g-recaptcha-bubble-arrow"
            style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;">
        </div>
        <div style="z-index: 2000000000; position: relative;"><iframe title="recaptcha challenge expires in two minutes"
                src="https://www.google.com/recaptcha/api2/bframe?hl=en&amp;v=1h-hbVSJRMOQsmO_2qL9cO0z&amp;k=6Ld51bQjAAAAAIlbrh4zi-mIxM93_fAD_UCawU54"
                name="c-rr627tx2e9r6" frameborder="0" scrolling="no"
                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                style="width: 100%; height: 100%;"></iframe></div>
    </div> -->
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
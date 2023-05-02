<?php
session_start();
error_reporting(0)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="png" href="Logo/Circle_1980x1980.png" />
    <link rel="stylesheet" href="style.css" />
    <title>DevTown Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
            width: 190px;
            height: 254px;
            background: #07182E;
            position: relative;
            display: flex;
            place-content: center;
            place-items: center;
            overflow: hidden;
            border-radius: 20px;
        }

        .card::before {
            content: '';
            position: absolute;
            width: 100px;
            background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
            height: 130%;
            animation: rotBGimg 3s linear infinite;
            transition: all 0.2s linear;
        }

        @keyframes rotBGimg {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .card::after {
            content: '';
            position: absolute;
            background: #07182E;
            inset: 5px;
            border-radius: 15px;
        }

        /* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} */
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
                    <li class="flex justify-center items-center hidden md:block md:text-xl xl:text-2xl"><a href="final_compiler/home.php" class="list-none">Compiler</a></li>
                    <?php
                    if (!$_SESSION['User']) {
                        echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
                    } else {
                        echo '<li class="flex hidden md:block justify-center items-center mr-3"><form method="post"><input type="submit" value="Logout" name="logout" class="bg-[#30559E] cursor-pointer text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl" /></form></li>';
                    }

                    ?>
                    <!-- <li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li> -->
                    <li class="flex justify-center items-center">
                        <input type="hidden" value="0" id="menu_toggle" />
                        <div class="relative flex h-[40px] w-[40px] cursor-pointer flex-col items-end justify-between p-[0.4rem] md:hidden" style="-webkit-tap-highlight-color: transparent" id="menu">
                            <span class="w-10 rounded-md py-[2px] false bg-[#011229] transition-all duration-300" id="first"></span>
                            <span class="w-8 py-[2px] rounded-md bg-[#011229] transition-all duration-300" id="second"></span>
                            <span class="w-6 false rounded-md bg-[#011229] py-[2px] transition-all duration-300" id="third"></span>
                        </div>
                        <!-- <div class="mx-2 cursor-pointer" style="-webkit-tap-highlight-color: transparent">
                            <div class="moon">
                                <svg width="40px" height="40px" viewBox="0 0 24.00 24.00" fill="none"
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
                                </svg>
                            </div>
                            <div class="sun hidden">
                                <img src="Logo/sun.svg" alt="Sun" width="40px" height="40px">
                            </div>
                        </div> -->
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
                    <!-- <li><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-lg">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a>
                    </li> -->
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
    </div>

    <!-- Course Cards -->
    <div class="flex flex-col justify-center items-center mt-24 sm:mt-32">
        <div class="grid grid-cols-2 gap-y-6 gap-x-6 sm:gap-y-10 sm:gap-x-10 md:gap-y-14 md:gap-x-14 lg:grid-cols-3 lg:gap-x-10 lg:gap-y-10 xl:gap-x-24 xl:gap-y-20 2xl:grid-cols-4 2xl:gap-y-16 2xl:gap-x-16">
            <?php
            function course_documwentation()
            {
                header('location: documentation.php');
            }
            $conn = new mysqli('localhost', 'root', '', 'devtown');
            if (!$conn)
                die(mysqli_error($conn));
            $sql = "SELECT * FROM `course` WHERE Flag = 0";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card w-[160px] h-[254px] flex flex-col justify-center items-center px-4 gap-y-4 sm:w-[250px] sm:h-[344px] sm:gap-y-6 sm:px-5 md:w-[300px] md:h-[394px] 2xl:w-[270px] 2xl:h-[364px] 2xl:px-7 2xl:gap-y-7" data-aos="zoom-in-up">
                    <img src="Logo/course/<?php echo $row['c_Photo']; ?>" alt="Course" class="z-[1] w-24 sm:w-32 md:w-40 lg:w-36 2xl:w-28">
                    <a href="tutorial.php?course_id=<?php echo $row['c_Id']; ?>" class="z-[1] bg-[#759DEA] text-center w-full text-md rounded-lg sm:text-xl md:text-2xl 2xl:text-xl"><button class="bg-[#759DEA] text-center w-full text-md rounded-lg p-1 sm:p-3 sm:text-xl md:text-2xl 2xl:text-xl 2xl:p-2">Start Tutorial</button></a>
                    <a href="documentation.php?course_id=<?php echo $row['c_Id']; ?>" class="z-[1] bg-[#759DEA] text-center w-full text-md rounded-lg sm:text-xl md:text-2xl 2xl:text-xl"><button class="bg-[#759DEA] text-center w-full text-md rounded-lg p-1 sm:p-3 sm:text-xl md:text-2xl 2xl:text-xl 2xl:p-2">Documentation</button></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
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

    <!-- AOS animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>
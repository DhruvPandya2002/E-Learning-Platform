<?php
include('letter_image.php');
include('comment_server.php');
error_reporting(0);
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));
?>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="png" href="Logo/Circle_1980x1980.png" />
    <link rel="stylesheet" href="style.css" />
    <title>DevTown Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="overflow: unset; -webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;" class="bg-gray-100">
    <!-- data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0"  -->
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
        <div class="animate__animated animate__fadeIn animate__faster absolute top-full left-0 right-0 z-[9998] backdrop-blur-lg pt-[10vh] pb-[8vh] font-rubik md:hidden  pointer-events-none hidden opacity-0 transition-all duration-300" style="background-color: rgba(255, 255, 255, 0.25); box-shadow: rgba(157, 157, 157, 0.2) 0px 4px 10px;">
            <ul class="flex flex-col items-center gap-y-6 md:hidden select-none">
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="about.php">About Us</a>
                </li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="Course.php">Courses</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="final_compiler/home.php">Programming Compiler</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="codeeditor/index.php">Web Design Compiler</a></li>
                <li class="text-center"><a class="font-rubik false text-xl leading-5" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="mt-[100px] flex flex-col justify-center items-center">
        <?php
             $sql_display = "SELECT * FROM blog WHERE Flag = 0";
             $result = mysqli_query($con, $sql_display);
             $count = 1;
             if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_array($result)) { 
                ?>
        <div class="mt-10 flex flex-col justify-center items-center bg-white shadow-lg w-[800px] px-5 py-4 rounded-lg">
            <h1 class="flex text-3xl font-medium"><?php echo $row['Title'];?></h1>
            <p class="text-lg mt-3"><?php
                        $id = $row['Blog_id'];
                        $content = $row['Content'];
                        $string = strip_tags($content);
                        if (strlen($string) > 200) :
                          $stringCut = substr($string, 0, 200);
                          $endPoint = strrpos($stringCut, ' ');
                          $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                          $string .= '...<a href="getBlog.php?id=' . $id . '" class="text-blue-800">Read More</a>';

                        endif;
                        echo $string;
                        ?></p>
        </div>
        <?php
               }
            }
        ?>
    </div>
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
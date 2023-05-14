<?php
include("letter_image.php");
include("comment_server.php");
error_reporting(0);
// session_start();
$_SESSION['PDF_COURSE_FILENAME'] = '';
$_SESSION['PDF_COURSE_CONTENT'] = '';
$conn = new mysqli('localhost', 'root', '', 'devtown');
if (!$conn)
    die(mysqli_error($conn));
$course_id = $_GET['course_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Documentation</title>
    <link rel="icon" type="png" href="Logo/Circle_1980x1980.png" />
    <link rel="stylesheet" href="style.css" />
    <!-- <link href="/dist/tailwind.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes vertical-shaking {
            0% {
                transform: translateY(0)
            }

            25% {
                transform: translateY(10px)
            }

            50% {
                transform: translateY(-10px)
            }

            75% {
                transform: translateY(10px)
            }

            100% {
                transform: translateY(0)
            }
        }

        .download_btn {
            animation-name: vertical-shaking;
            animation-duration: 1s;
            animation-delay: 500ms;
            animation-timing-function: ease-in-out;
            animation-iteration-count: 1;
            animation-play-state: running;
        }

        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body class="bg-white scroll-smooth" style="-webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
    <div class="overflow-hidden overflow-x-auto">
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
        <div class="flex scroll-smooth scrollbar-hide">
            <div class="sidebar lg:block xl:block 2xl:block fixed top-16 sm:top-[81px] bottom-0 lg:left-0 w-[300px] overflow-y-auto hidden text-center bg-[#DCE1F9]">
                <div class="text-[#30559E] mt-2 text-xl">
                    <div class="px-2 flex justify-between items-center">
                        <?php
                        $query = "SELECT `c_Name` FROM `course` WHERE `c_Id` = $course_id";
                        $c_name = mysqli_query($conn, $query);
                        if (mysqli_num_rows($c_name) > 0) {
                            while ($rowData = mysqli_fetch_assoc($c_name)) {
                        ?>
                                <h1 class="font-bold text-[#30559E] text-[20px] ml-3 lg:ml-1 lg:text-[24px] lg:mb-1 xl:ml-1 xl:mb-1 xl:text-[24px] 2xl:ml-1 2xl:text-[24px] 2xl:mb-1"><?php echo $rowData['c_Name']; ?></h1>
                        <?php
                            }
                        }
                        ?>
                        <i class="bi bi-x closeSidebar cursor-pointer text-3xl lg:hidden" onclick="closeSidebar()"></i>
                    </div>
                    <div class="mb-1 mx-3 bg-gray-900 h-[1.5px]"></div>
                    <div class="flex flex-col justify-center items-start gap-y-2 text-left">
                        <?php
                        $sql = "SELECT * FROM `course_content` WHERE `course_id` = '$course_id' and `type` = 'Text' and `Flag` = 0";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="documentation.php?course_id=<?php echo $row['course_id'] ?>&content_id=<?php echo $row['content_id']; ?>">
                                <h1 class="text-[#30559E] active:text-[#0C1546] active:text-[20px] font-medium text-[18px] ml-3"><?php echo $row['topic_name']; ?></h1>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="mt-24 sm:mt-[6.5rem] lg:ml-80 p-5 sm:p-6 lg:p-0 flex justify-start flex-wrap">
                <?php
                if (!$_GET['content_id']) {
                    $sql = "SELECT `content`,`topic_name` FROM `course_content` WHERE `course_id` = '$course_id' and `type` = 'Text' and `Flag` = 0 LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="text-3xl font-medium text-[#30559E]">' . $row['topic_name'] . '</div>
                    <div class="text-gray-800 text-xl mt-4 md:text-2xl lg:p-2 w-auto h-auto">' . $row['content'] . '</div>';
                        $_SESSION['PDF_COURSE_FILENAME'] = $row['topic_name'];
                        $_SESSION['PDF_COURSE_CONTENT'] = $row['content'];
                    }
                } else {
                    $content_id = $_GET['content_id'];
                    $sql2 = "SELECT `content`,`topic_name` FROM `course_content` WHERE `course_id` = '$course_id' and `type` = 'Text' and `Flag` = 0 and `content_id` = '$content_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo '<div class="text-4xl font-semibold text-[#30559E]">' . $row2['topic_name'] . '</div>
                    <div class="text-gray-800 text-xl mt-4 md:text-2xl lg:p-2 w-auto h-auto">' . $row2['content'] . '</div>';
                        $_SESSION['PDF_COURSE_FILENAME'] = $row2['topic_name'];
                        $_SESSION['PDF_COURSE_CONTENT'] = $row2['content'];
                    }
                }
                ?>
                <a href="download_course_pdf.php"><button title="Download PDF" class="download_btn fixed z-90 bottom-6 right-6 sm:bottom-8 sm:right-8 lg:bottom-10 lg:right-14 bg-[#DCE1F9] w-16 sm:w-20 sm:h-20 h-16 rounded-full shadow-md flex justify-center items-center text-white text-2xl sm:text-3xl lg:text-4xl"><i class="fa-solid fa-download" style="color: #30559e;"></i></button></a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function openSidebar() {
            $('.sidebarbtn').click(function() {
                $('.sidebar').removeClass("hidden").fadeIn();
                $('.sidebarbtn').addClass("hidden");
                $('.navbar').removeClass("h-24").addClass("h-16").removeClass("sm:h-28").addClass("sm:h-20").removeClass("md:h-28").addClass("md:h-20");
                $('.hori_line').addClass("hidden");
            });
        }

        function closeSidebar() {
            $('.closeSidebar').click(function() {
                $('.sidebar').addClass("hidden").fadeOut();
                $('.sidebarbtn').removeClass("hidden");
                $('.navbar').removeClass("h-16").removeClass("sm:h-20").removeClass("md:h-20");
                $('.hori_line').removeClass("hidden");
            });
        }

        // function download_btn(){
        //     var download_btn = document.querySelector('.download_btn');
        //     $(download_btn).css('animation','vertical-shaking 0.35s');
        // }
    </script>
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
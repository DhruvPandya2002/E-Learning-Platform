<?php
error_reporting(0);
session_start();
$course_id = $_GET['course_id'];
$conn = new mysqli('localhost', 'root', '', 'devtown');
if (!$conn)
    die(mysqli_error($conn));

$reply_flag = 0;
function letters_images($all_username){
    $user_name = $_SESSION['User'];
    $user_first_letter = substr($user_name, 0 , 1);
    if($user_first_letter == 'A' || $user_first_letter == 'a'){
        echo '<img src="letters_images/a.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }
    elseif($user_first_letter == 'B' || $user_first_letter == 'b'){
        echo '<img src="letters_images/b.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'C' || $user_first_letter == 'c'){
        echo '<img src="letters_images/c.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'D' || $user_first_letter == 'd'){
        echo '<img src="letters_images/d.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'E' || $user_first_letter == 'e'){
        echo '<img src="letters_images/e.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'F' || $user_first_letter == 'f'){
        echo '<img src="letters_images/f.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'G' || $user_first_letter == 'g'){
        echo '<img src="letters_images/g.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'H' || $user_first_letter == 'h'){
        echo '<img src="letters_images/h.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'I' || $user_first_letter == 'i'){
        echo '<img src="letters_images/i.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'J' || $user_first_letter == 'j'){
        echo '<img src="letters_images/j.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'K' || $user_first_letter == 'k'){
        echo '<img src="letters_images/k.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'L' || $user_first_letter == 'l'){
        echo '<img src="letters_images/l.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'M' || $user_first_letter == 'm'){
        echo '<img src="letters_images/m.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'N' || $user_first_letter == 'n'){
        echo '<img src="letters_images/n.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'O' || $user_first_letter == 'o'){
        echo '<img src="letters_images/o.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'P' || $user_first_letter == 'p'){
        echo '<img src="letters_images/p.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'Q' || $user_first_letter == 'q'){
        echo '<img src="letters_images/q.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'R' || $user_first_letter == 'r'){
        echo '<img src="letters_images/r.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'S' || $user_first_letter == 's'){
        echo '<img src="letters_images/s.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'T' || $user_first_letter == 't'){
        echo '<img src="letters_images/t.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'U' || $user_first_letter == 'u'){
        echo '<img src="letters_images/u.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'V' || $user_first_letter == 'v'){
        echo '<img src="letters_images/v.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'W' || $user_first_letter == 'w'){
        echo '<img src="letters_images/w.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }  
    elseif($user_first_letter == 'X' || $user_first_letter == 'x'){
        echo '<img src="letters_images/x.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                                
    elseif($user_first_letter == 'Y' || $user_first_letter == 'y'){
        echo '<img src="letters_images/y.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
    }                                   
    elseif($user_first_letter == 'Z' || $user_first_letter == 'z'){
        echo '<img src="letters_images/z.svg" alt="" class="w-8 sm:w-14 lg:w-10">';
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
    <title>DevTown Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nav-btn {
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
        }
    </style>
</head>

<body class="bg-[#F5F5F5] scroll-smooth" style="-webkit-tap-highlight-color: transparent; font-family: 'Rubik', sans-serif;" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
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
                        if(!$_SESSION['User']){
                            echo '<li class="flex hidden md:block justify-center items-center mr-3"><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl md:text-xl md:font-medium md:px-5 md:py-1 w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-xl">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a></li>';
                        }else{
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
                    <!-- <li><a href="login.php"><button class="bg-[#30559E] text-xl sm:text-2xl w-fit px-8 sm:px-10 py-2 text-white rounded-lg flex justify-center items-center shadow-lg">Login<img src="Logo/icons8-login-64.png" alt="Login" width="38px" class="sm:w-[42px]"></button></a>
                    </li> -->
                </ul>
                <div class="mt-6 flex w-full flex-col items-center justify-center gap-x-2 md:hidden">

                </div>
            </div>
        </div>
    </div>
    <!-- Video Section -->
    <div class="mt-20 xl:mt-24">
        <div class="px-2 xl:px-4 lg:px-2 md:px-6 flex flex-col lg:flex-row lg:justify-start justify-start">
            <div class="flex justify-center items-center lg:justify-start lg:items-start">
                <?php
                if (!$_GET['content_id']) {
                    $query = "SELECT * FROM `course_content` WHERE `course_id` = '$course_id' and `type`='Video' and `Flag` = 0 LIMIT 1";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['content_id'] = $row['content_id'];
                ?>
                        <div class="h-[35vh] w-[380px] sm:my-5 sm:mx-2 sm:w-[620px] md:w-[460vh] md:h-[40vh] lg:w-[110vh] lg:h-[60vh] lg:my-3 lg:mx-2 xl:h-[60vh] xl:w-[110vh] xl:my-0 xl:mx-0 2xl:w-[130vh] 2xl:h-[70vh] shadow-lg"><?php echo $row['content']; ?></div>
                    <?php
                    }
                } else {
                    $content_id = $_GET['content_id'];
                    $_SESSION['content_id'] = $_GET['content_id'];
                    $query = "SELECT * FROM `course_content` WHERE `course_id` = '$course_id' and `type`='Video' and `Flag` = 0 and `content_id` = '$content_id'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="h-[35vh] w-[380px] sm:my-5 sm:mx-2 sm:w-[620px] md:w-[460vh] md:h-[40vh] lg:w-[110vh] lg:h-[60vh] lg:my-3 lg:mx-2 xl:h-[60vh] xl:w-[110vh] xl:my-0 xl:mx-0 2xl:w-[130vh] 2xl:h-[70vh] shadow-lg"><?php echo $row['content']; ?></div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="nav-btn flex justify-center items-center my-5 lg:hidden">
                <ul>
                    <li class="active sm:text-3xl"><a href="#playlist">Syllabus</a></li>
                    <li class="sm:text-3xl"><a href="#discussion">Discussion</a></li>
                </ul>
            </div>
             <!-- Playlist -->
             <div id="playlist" class="bg-[#DCE1F9] mx-1 mb-5 py-4 px-2 text-lg sm:text-2xl sm:my-2 lg:text-lg lg:h-[61vh] xl:px-4 xl:py-4 flex flex-col xl:w-[27rem] xl:h-[60vh] xl:my-0 xl:mx-4 2xl:h-[70vh] rounded-xl overflow-y-auto ">
                <h1 class="text-gray-900 text-xl sm:text-3xl lg:text-xl font-semibold ml-3">Playlist :</h1>
                <?php
                $sql = "SELECT * FROM `course_content` WHERE `course_id` = '$course_id' and `type`='Video' and `Flag` = 0";
                $record = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($record)) {
                ?>
                    <a href="tutorial.php?course_id=<?php echo $data['course_id']; ?>&content_id=<?php echo $data['content_id']; ?>" class="py-3 px-3 text-[#30559E] font-medium active:text-gray-900">
                        <h1><?php echo $data['topic_name']; ?></h1>
                    </a>
                    <div class="mb-1 mx-2 bg-[#30559E] h-[1.5px]"></div>
                <?php
                }
                ?>
            </div>
        </div>
            <!-- Discussion -->
        <div id="discussion" class="bg-[#DCE1F9] m-2 flex flex-col px-3 py-5 sm:px-6 sm:py-7 sm:m-4 lg:w-[110vh] lg:bg-transparent rounded-xl md:mt-5 lg:mt-2 lg:py-3 lg:px-2">
                <div class="flex items-center">
                    <?php
                        letters_images(null);     
                        if(isset($_POST['comment_send'])){
                            $content_id = $_SESSION['content_id'];
                            $course_id = $_GET['course_id'];
                            $comment = $_POST['comment'];
                            $sender = $_SESSION['User'];
                            $sql = "INSERT INTO `comment`(`parent_id`,`content_id`,`course_id`,`comment`,`sender`,`flag`) VALUES ('0','$content_id','$course_id','$comment','$sender','0')";
                            mysqli_query($conn,$sql);
                        }                                                   
                    ?>
                    <form action="" method="post" class="flex items-center">
                    <input type="text" class="bg-transparent w-[17rem] sm:w-[30rem] sm:text-2xl sm:pl-3 sm:h-16 md:w-[35rem] md:text-3xl xl:w-[110vh]
                    lg:h-12 lg:text-xl border-2 border-gray-400 py-1 pl-2 ml-2 rounded-lg text-lg focus:outline-[#30559E] focus:outline-4" name="comment" placeholder="Add a comment...">
                    <button name="comment_send" type="submit"><img src="Logo/send.svg" alt="" class="w-8 mx-1 sm:w-12 sm:h-16 md:w-14 lg:w-12 lg:h-12 comment-send"></button>
                    </form>
                </div>
                <div class="bg-[#30559E] w-full h-[1px] my-3 md:my-5 lg:my-3"></div>
                <?php 
                        $content_id = $_SESSION['content_id'];
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM `comment` WHERE `content_id` = '$content_id' and `course_id` = '$course_id'";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="flex items-center mt-3">
                    <?php 
                            letters_images($row['sender']);
                    ?>
                    <!-- <img src="letters_images/d.svg" alt="" class="w-8 mt-1 sm:w-14 lg:w-10"> -->
                    <div class="flex flex-col ml-2 sm:mt-3">
                        <h3 class="text-[#30559E] text-lg font-medium sm:text-3xl lg:text-xl"><?php echo $row['sender'];?><span class="text-[15px] sm:text-[20px] ml-2 lg:text-[15px]">3min ago</span></h3>
                        <p class="text-gray-800 sm:text-3xl lg:text-2xl"><?php echo $row['comment'];?></p>
                        <?php
                            if($reply_flag > 0){
                                echo '<button class="bg-[#30559E] w-28 cursor-pointer text-white sm:w-40 p-2 rounded-md sm:rounded-xl text-sm sm:text-2xl sm:mt-4 mt-2 sm:py-4 sm:px-2 lg:text-lg lg:rounded-lg lg:py-1 lg:w-32"><i class="fa-solid fa-caret-down mr-2"></i><span class="mr-2">3</span>Replies</button>';
                            }
                        ?>
                    </div>
                </div>
                <?php 
                        }
                    ?>
            </div>
        </div>
        <div>
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

            // nav button
            var nav = $('.nav-btn');
            var line = $('<div />').addClass('line');

            line.appendTo(nav);

            var active = nav.find('.active');
            var pos = 0;
            var wid = 0;

            if (active.length) {
                pos = active.position().left;
                wid = active.width();
                line.css({
                    left: pos,
                    width: wid
                });
            }

            nav.find('ul li a').click(function(e) {
                e.preventDefault();
                if (!$(this).parent().hasClass('active') && !nav.hasClass('animate')) {

                    nav.addClass('animate');

                    var _this = $(this);

                    nav.find('ul li').removeClass('active');

                    var position = _this.parent().position();
                    var width = _this.parent().width();

                    if (position.left >= pos) {
                        line.animate({
                            width: ((position.left - pos) + width)
                        }, 300, function() {
                            line.animate({
                                width: width,
                                left: position.left
                            }, 150, function() {
                                nav.removeClass('animate');
                            });
                            _this.parent().addClass('active');
                        });
                    } else {
                        line.animate({
                            left: position.left,
                            width: ((pos - position.left) + wid)
                        }, 300, function() {
                            line.animate({
                                width: width
                            }, 150, function() {
                                nav.removeClass('animate');
                            });
                            _this.parent().addClass('active');
                        });
                    }

                    pos = position.left;
                    wid = width;
                }
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
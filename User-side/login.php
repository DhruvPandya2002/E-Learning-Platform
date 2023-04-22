<?php

session_start();

$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
  die(mysqli_error($con));

if (isset($_POST['btn_login'])) {
  $email = $_POST['Email'];
  $_SESSION['email'] = $email;
  $password = $_POST['password'];

  $email_search = "SELECT * from `users` where `email`='$email' ";

  $query = mysqli_query($con, $email_search);

  $email_count = mysqli_num_rows($query);

  if ($email_count) {

    $email_pass = mysqli_fetch_assoc($query);

    $db_pass = $email_pass['password'];
    $flag = $email_pass['flag'];
    $_SESSION['User'] = $email_pass['name'];
    $uid = $email_pass['user_id'];
    $status = 1;
    $_SESSION['UID'] = $email_pass['user_id'];

    if ($db_pass === $password && $flag == '0') {

      // updating the user status to checkk is he online or offline.
      $res = mysqli_query($con, "UPDATE `users` set `user_status`='$status' where `user_id`='$uid'");

      //  user status table event start here
      $today = date("Y-m-d");
      // $today = "2023-04-19";
      $_SESSION['date'] = $today;
      $name = $_SESSION['User'];
      $login = date("H:i:s");
      $_SESSION['time'] = $login;
      // Check if user name and today's date are not found together in any row
      $sql = "SELECT * FROM `user_status` WHERE `user_name`='$name' AND `date`='$today'";
      $result = $con->query($sql);

      if ($result->num_rows == 0) {
        // User name and today's date are not found together, so insert a new row 
        $sql = "INSERT INTO `user_status`(`user_name`,`login`,`date`) VALUES ('$name', '$login','$today')";
        if ($con->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $con->error;
        }
      } else {
        // User name and today's date are already found together in a row, so do nothing
        $update = "UPDATE `user_status` SET `login`='$login' WHERE `user_name`='$name' AND `date`='$today' ";
        $result = $con->query($update);
      }
      // end here


      // echo '<script>alert("login successfull")</script>';
      header('location:index.php');
    } else {
      echo '<script>alert("password incorrect")</script>';
    }
  } else {
    echo  '<script>alert("invalid Email")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="png" href="Logo/Circle_1980x1980.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>DevTown-Admin</title>
</head>

<body class="flex flex-wrap justify-center items-center h-screen ml-2 mr-2 mb-5 mt-5 bg-gray-300 scroll-smooth md:ml-6 md:mr-6 md:mt-10 md:mb-10 lg:flex-row xl:mr-16 xl:flex-row xl:ml-16 xl:mb-1 xl:mt-1">
  <div class="">
    <div class="container rounded-lg lg:flex drop-shadow-lg">
      <div class="left-side bg-gradient-to-tl from-[#759DEA] to-[#30559E] rounded-t-lg md:rounded-tl-xl md:rounded-tr-xl lg:w-fit lg:rounded-tr-none lg:rounded-bl-xl lg:pt-12 xl:pt-8 xl:pb-8 2xl:pl-6 2xl:pr-6">
        <img src="Logo/main_logo_part.png" alt="" class="pt-10 pr-10 pl-10 flex justify-center md:w-[450px] md:m-auto lg:w-[800px] xl:w-[900px] xl:pr-20 xl:pl-20
         2xl:w-[500px]" />
        <p class="flex justify-center  m-auto text-[60px] text-[#17294F] sm:text-[90px] lg:text-[70px]">
          DevTown
        </p>
      </div>
      <div class="right bg-white p-5 rounded-b-xl sm:p-8 md:p-10 lg:rounded-bl-none lg:rounded-tr-xl xl:p-16 2xl:p-12">
        <h1 class="text-3xl font-semibold sm:text-6xl lg:text-4xl xl:text-3xl">Login</h1>
        <p class="text-gray-700 text-md sm:text-3xl sm:mt-5 lg:text-[24px] lg:mt-2 xl:text-xl 2xl:mt-0">Sign in for Pages</p>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
          <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-0">
            <input type="email" name="Email" class="email border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg" placeholder="Enter Your Email..." />
            <span class="absolute text-md pl-1 pr-1 mx-2 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Email</span>
            <!-- <input value="<?php echo $uid; ?>" /> -->
          </div>
          <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-2">
            <input type="password" name="password" class="border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg" placeholder="Enter Your Password..." />
            <span class="absolute text-md mx-2 pl-1 pr-1 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl
              lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Password</span>
          </div>
          <a href="#" class="flex justify-center mt-4 text-md text-blue-700 sm:text-3xl sm:mt-6 lg:mt-6 lg:text-2xl xl:text-2xl 2xl:text-xl 2xl:mt-4" onclick="forgot_password()">Forgot
            Password?</a>
          <div class="flex justify-center">
            <button name="btn_login" class="bg-[#30559E] w-full mt-4 text-white border border-[#30559E] rounded-sm p-2 text-lg hover:bg-white hover:text-[#30559E] sm:h-20 sm:text-4xl sm:mt-6 lg:h-14 lg:text-2xl lg:rounded-lg lg:mt-6 xl:h-16 xl:text-2xl 2xl:w-[450px] 2xl:text-xl 2xl:h-12 2xl:mt-4" type="submit">
              Login
            </button>
          </div>
        </form>
        <img src="Logo/OR_new.png" alt="" class="w-full mt-4 sm:mt-6 lg:mt-6 2xl:w-[450px] 2xl:mt-5" />
        <div class="flex justify-between mt-4 sm:mt-8 lg:mt-8 2xl:mt-7">
          <a href="https://www.facebook.com/"><img src="Logo/facebook.png" alt="" class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.google.com/"><img src="Logo/google.png" alt="" class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.twitter.com/"><img src="Logo/twitter.png" alt="" class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.linkedin.com/"><img src="Logo/linkedin.png" alt="" class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
        </div>
        <div class="text-md mt-4 flex justify-center sm:text-3xl sm:mt-6 lg:mt-8 lg:text-2xl xl:text-2xl 2xl:text-xl 2xl:mt-8">
          <p>Don't have account? <a href="signup.php" class="text-blue-700">Create An Account</a></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function forgot_password() {
      alert('Please Check Your Email!');
    }
  </script>
</body>

</html>
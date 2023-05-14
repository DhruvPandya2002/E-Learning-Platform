<?php
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$sql = "INSERT INTO `contact` (`name`,`email`,`mobile_number`,`subject`,`message`) VALUES ('$name','$email','$mobile','$message','$subject')";
mysqli_query($con , $sql);
    
?>
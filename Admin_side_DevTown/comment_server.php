<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devtown";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
  die(mysqli_error($conn));
}
if (isset($_GET['delete_id'])) {
  $del_id = $_GET['delete_id'];
  $mydelete = "UPDATE `comment` SET `flag`= '1' WHERE `id`='$del_id' or `parent_id` = '$del_id'";
  mysqli_query($conn, $mydelete);
  header('location:comment.php'); // redirecting to Admin page 
}

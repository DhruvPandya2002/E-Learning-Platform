<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'devtown');


$premium_id = $_POST['premium_id'];
$premium_course_id = $_POST['premium_course_id'];
$sender = $_POST['sender'];
$parent_id = $_POST['parent_id'];
// Get the form data
// $name = mysqli_real_escape_string($conn, $_POST['name']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
echo $premium_id;
echo $premium_course_id;
echo $sender;
echo $parent_id;
echo $comment;
// Insert the comment into the database
// $query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    $query = "INSERT INTO `premium_comment` (`parent_id`,`course_id`, `content_id`, `comment`, `sender`, `flag`) VALUES ($parent_id,$premium_course_id, $premium_id, '$comment', '$sender', 0)";
mysqli_query($conn, $query);


// Close the database connection
mysqli_close($conn);
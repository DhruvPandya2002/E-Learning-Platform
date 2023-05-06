<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'devtown');


$content_id = $_POST['content_id'];
$course_id = $_POST['course_id'];
$sender = $_POST['sender'];
$parent_id = $_POST['parent_id'];

// Get the form data
// $name = mysqli_real_escape_string($conn, $_POST['name']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

// Insert the comment into the database
// $query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    $query = "INSERT INTO comment (parent_id,content_id, course_id, comment, sender, flag) VALUES ('$parent_id','$content_id', '$course_id', '$comment', '$sender', '0')";
mysqli_query($conn, $query);


// Close the database connection
mysqli_close($conn);
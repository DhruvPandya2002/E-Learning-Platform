<?php
session_start();
error_reporting(0);
$conn = new mysqli('localhost', 'root', '', 'devtown');

if (!$conn) {
    die(mysqli_error($conn));
}

$course_id = $_SESSION['premium_course_id'];

// to fetch total no of videos in the database
$query = "SELECT COUNT(`content`) AS `total_videos` FROM `premium_course` WHERE `premium_course_id`='$course_id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($result);
    $total_videos = $row['total_videos'];
}

// to fetch the course name 
$my_query = "SELECT * FROM `premium_course` WHERE `premium_course_id` = '$course_id'";
$res = mysqli_query($conn, $my_query);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_array($res);
    $course_name = $row['premium_course_name'];
}


$username = isset($_SESSION['User']) ? $_SESSION['User'] : '';
$user_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$watched = $_POST['watched'] === 'true' ? 1 : 0;
$video_id = $_POST['video_id'];

// check if user_watched already has a record for this user with this course name
$check_query = "SELECT * FROM `user_watched` WHERE `user_name` = '$username' AND `course_name` = '$course_name'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // if there is already a record, update the watched_videos count
    $row = mysqli_fetch_array($check_result);
    $watched_videos = $row['watched_videos'] + $watched;

    $stmt = $conn->prepare("UPDATE user_watched SET watched_videos = ? WHERE user_name = ? AND course_name = ?");
    $stmt->bind_param("iss", $watched_videos, $username, $course_name);
} else {
    // if there is no record, insert a new one
    $stmt = $conn->prepare("INSERT INTO user_watched (user_name, user_email, total_videos, watched_videos, course_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $username, $user_email,$total_videos, $watched, $course_name);
}

// insert the video record into the videos table
$stmt2 = $conn->prepare("INSERT INTO videos (user_name, watched, video_id) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $username, $watched, $video_id);
if ($stmt2->execute()) {
    // echo "ok";

    if ($stmt2->affected_rows == 1) {
        if ($stmt->execute()) {
            if ($stmt->affected_rows == 1) {
                
                // echo " Data inserted into user_watched table.";                                
            } else {
                // echo "Error: Failed to update watched videos count";
            }
        } else {
            // echo "Error: " . $stmt->error;
        }
    }
} else {
    if ($conn->errno == 1062) {
        // echo "data already exists";
    } else {
        // echo "Error: " . $stmt2->error;
    }
}

$stmt->close();
$stmt2->close();
$conn->close();

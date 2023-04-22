<?php
session_start();

$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

$_SESSION['date'];
$_SESSION['UID'];
$_SESSION['User'];
echo $_SESSION['time'];

if (!isset($_SESSION['UID'])) {
    header('location:index.php');
    die();
}

$uid = $_SESSION['UID'];
$status = 0;

if (isset($_POST['logout'])) {

    $sql  = "UPDATE `users` SET `user_status`='$status' WHERE `user_id`='$uid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $username = $_SESSION['User'];
        $today_date = $_SESSION['date'];

        // Check if a row exists for current user and today's date with no logout time 
        $query = "SELECT * FROM `user_status` WHERE `user_name`='$username' AND `date`='$today_date'";
        $result_logout = mysqli_query($con, $query);

        if (mysqli_num_rows($result_logout) > 0) {

            // Updateing the existing row with the logout time

            $logout_time = date("H:i:s"); // getting the current logout time
            $update_query = "UPDATE `user_status` SET `logout`='$logout_time' WHERE `user_name`='$username' AND `date`='$today_date'";
            mysqli_query($con, $update_query);

            // get the user's login , logout times and difference from the user table
            $sql = "SELECT `login` , `logout` , `difference` FROM `user_status` WHERE `user_name` = '$username' AND `date`='$today_date'";
            $result = mysqli_query($con, $sql);

            // calculate the total time difference
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $login_time = strtotime($row["login"]);
                $logout_time = strtotime($row["logout"]);

                // total time difference calculation
                $diff = $row["difference"];
                $total_time = $logout_time - $login_time;
                $new_diff = $total_time + $diff;

                // update the user's total time difference into the difference column of the user table
                $sql = "UPDATE `user_status` SET `difference` = '$new_diff' WHERE `user_name` = '$username' AND `date`='$today_date'";
                if (mysqli_query($con, $sql)) {
                    echo "Total time difference updated successfully";
                } else {
                    echo "Error updating total time difference: " . mysqli_error($con);
                }
            }
        } else {
            // No row found for current user and today's date with logout , do nothing
        }
        header('location:logout.php');
    }
}
?>

<html>

<body>
    <form method="POST">
        <input type="submit" value="logout" name="logout">
    </form>
</body>

</html>
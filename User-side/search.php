<?php
// session_start();
$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

if (isset($_POST['countryQuery'])) {
    $countryId = $_POST['countryQuery'];
    $state = "SELECT * FROM `states` WHERE `country_id` = '$countryId'";
    $state_result = mysqli_query($con, $state);
    while ($row = mysqli_fetch_array($state_result)) {
        $id = $row['id'];
        $stateName = $row['name'];
        echo "<option value='$id'>$stateName</option>";
    }
}

if (isset($_POST['stateQuery'])) {
    $stateId = $_POST['stateQuery'];
    $city = "SELECT * FROM `cities` WHERE `state_id` = '$stateId'";
    $city_result = mysqli_query($con, $city);
    while ($row = mysqli_fetch_array($city_result)) {
        $id = $row['id'];
        $cityName = $row['name'];
        echo "<option value='$id'>$cityName</option>";
    }

    if ($city_result) {
        echo "<script>alert(Data submitted)</script>";
    }
}

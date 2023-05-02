<?php
session_start();
// echo $_SESSION['oldDiff'];
// echo $_SESSION['newDiff'];
// echo $_SESSION['hour'];
// echo $_SESSION['minute'];
// echo $_SESSION['second'];
unset($_SESSION['UID']);
unset($_SESSION['User']);
header('location:index.php');
die();

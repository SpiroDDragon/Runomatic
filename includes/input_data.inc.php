<?php

session_start();

include '../dbh.php';

$uid = $_SESSION['uid'];
$date = $_POST['date'];
$dis = $_POST['dis'];
$hrs = $_POST['hrs'];
$min = $_POST['min'];
$sec = $_POST['sec'];

$sql = "INSERT INTO user_data (uid, date, dis, hrs, min, sec) VALUES ('$uid', '$date', '$dis', '$hrs', '$min', '$sec')";
$result = mysqli_query($connection, $sql);

header("Location: ../profile.php");
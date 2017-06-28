<?php

session_start();

include '../dbh.php';

if (isset($_POST['edit_data'])) {

    $data_id = $_POST['data_id'];
    $date = $_POST['date'];
    $dis = $_POST['dis'];
    $hrs = $_POST['hrs'];
    $min = $_POST['min'];
    $sec = $_POST['sec'];

    $sql = "UPDATE user_data SET date='$date', dis='$dis', hrs='$hrs', min='$min', sec='$sec' WHERE data_id='$data_id'";
    $result = mysqli_query($connection, $sql);

    header("Location: ../profile.php");

} elseif (isset($_POST['cancel_edit'])) {

    header("Location: ../profile.php");
}
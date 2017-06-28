<?php

session_start();

include '../dbh.php';

if (isset($_POST['edit_data'])) {

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $sql = "UPDATE users SET fname='$fname', lname='$lname', uid='$uid', pwd='$pwd' WHERE id='$id'";
    $result = mysqli_query($connection, $sql);

    header("Location: ../profile.php");

} elseif (isset($_POST['cancel_edit'])) {

    header("Location: ../profile.php");
}
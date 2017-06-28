<?php

session_start();

include '../dbh.php';
 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO users (fname, lname, uid, pwd, privilege) VALUES ('$fname', '$lname', '$uid', '$pwd', 'user')";
$result = mysqli_query($connection, $sql);

$sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($connection, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['priv'] = $row['privilege'];
    $_SESSION['uid'] = $row['uid'];
}

header("Location: ../profile.php");
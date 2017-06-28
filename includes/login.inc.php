<?php

session_start();

include '../dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($connection, $sql);


if (!$row=mysqli_fetch_assoc($result)) {
    header('Location: ../index.php');
} else {
    $_SESSION['id'] = $row['id'];
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['priv'] = $row['privilege'];
    header("Location: ../profile.php");
}



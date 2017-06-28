<?php
if(!isset($_SESSION)) {
    session_start();
};
include 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Run-o-matic</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widthe, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="
    sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="
    sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="
    sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="wrapper">
            <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">Run-o-matic</a>
                    </div>
                        <?php
                        if (!isset($_SESSION['id'])) {
                            echo "<form class='navbar-form navbar-right' action='includes/login.inc.php' method='POST'>
                                    <div class='form-group'>
                                        <input class='form-control' type='text' name='uid' placeholder='Username' required>
                                        <input class='form-control' type='password' name='pwd' placeholder='Password' required>
                                    </div>
                                    <button type='submit' class='btn btn-success'>Log In</button>
                                </form>";
                        } else {
                            echo "<form class='navbar-form navbar-right' action='includes/logout.inc.php'>
                            <div class='form-group'>
                                <p class='loggedin'>You are logged in as <b>".$_SESSION['uid']."</b>!</p>
                            </div>
                            <button type='submit' class='btn btn-warning'>Log Out</button>
                        </form>";
                        }
                        ?>
            </div>
        </div>
    </nav>

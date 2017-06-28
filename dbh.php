<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "runomatic";

    $connection = mysqli_connect($servername, $username, $password, $database);

    if (!$connection) {
        die("Connection failed : ".mysqli_connect_error());
    }

?>
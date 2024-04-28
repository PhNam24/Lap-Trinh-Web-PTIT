<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bt3_employee";

    $sql_connect =  new mysqli($servername, $username, $password, $dbname);
    if ($sql_connect->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
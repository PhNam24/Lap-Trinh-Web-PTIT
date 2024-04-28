<?php

    session_start();
    $id = $_GET['id'];
    require_once('connect.php');

    $query1 = "DELETE from nhan_vien_tbl WHERE id = $id";

    $result = $sql_connect->query($query);

    header("Location: staff.php");
    exit();

?>
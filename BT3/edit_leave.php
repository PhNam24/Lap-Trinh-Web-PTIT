<?php
    session_start();
    $id = $_GET['id'];
    $state = $_GET['state'];
    require_once('connect.php');

    $query = "UPDATE nghi_phep_tbl SET trang_thai=$state WHERE id_nghi=$id" ;

    $result = $sql_connect->query($query);

    header("Location: leave.php");
    exit();
?>
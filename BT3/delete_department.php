<?php

    session_start();
    $id = $_GET['id'];
    require_once('connect.php');
    
    $query = "DELETE from chuc_vu_tbl WHERE id_cv = $id;";
    $query1 = "UPDATE nhan_vien_tbl SET id_chuc_vu='0' WHERE id_chuc_vu=$id;";
    $result = $sql_connect->multi_query($query.$query1);

    header("Location: department.php");
    exit();

?>
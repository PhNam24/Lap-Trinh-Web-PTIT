<?php

    session_start();
    $id = $_GET['id'];
    require_once('connect.php');
    
    $query = "DELETE from chuc_vu_tbl WHERE id_cv = $id";

    $result = $sql_connect->query($query);

    header("Location: department.php");
    exit();

?>
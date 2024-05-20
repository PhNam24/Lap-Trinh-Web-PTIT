<?php

    session_start();
    $id = $_GET['id'];
    require_once('connect.php');

    $query = "DELETE from luong_tbl WHERE id_nhanvien = $id;";
    $query1 = "DELETE from login_tbl WHERE id_nv = $id;";
    $query2 = "DELETE from nghi_phep_tbl WHERE id_nhanvien = $id;";
    $query3 = "DELETE from nhan_vien_tbl WHERE id_nv = $id;";

    $sql_connect->multi_query($query.$query1.$query2.$query3);
    
    header("Location: staff.php");
    exit();

?>
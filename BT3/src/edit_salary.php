<?php

    session_start();

    require_once('connect.php');

    $id = $_GET['id'];
    $id_nv = $date = "";
    $luong_co_ban = $phu_cap = $tong_luong = 0;
    $idErr = $cbErr = $pcErr = "";

    $query = "SELECT * FROM luong_tbl WHERE id_luong=$id";
    $salary_result = $sql_connect->query($query);

    if (mysqli_num_rows($salary_result) == 1) {
        $salary = mysqli_fetch_assoc($salary_result);
        $id_nv = $salary['id_nhanvien'];
        $date = $salary['ngay_cap_nhat'];
        $luong_co_ban = $salary['luong_co_ban'];
        $phu_cap = $salary['phu_cap'];
        $tong_luong = $salary['tong_luong'];
    } 

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["id_nv"])) {
            $idErr = "Chưa nhập ID nhân viên";
        } else {
            $id_nv = test_input($_POST["id_nv"]);
            if (!preg_match("/^[0-9' ]*$/",$id_nv)) {
                $idErr = "Chỉ bao gồm chữ số";
            }
        }
        
        if (empty($_POST["date"])) {
            $date = "";
        } else {
            $date = test_input($_POST["date"]);
        }

        if (empty($_POST["luong_co_ban"])) {
            $cbErr = "Chưa nhập lương cơ bản";
        } else {
            $luong_co_ban = test_input($_POST["luong_co_ban"]);
            if (!preg_match("/^[0-9' ]*$/",$luong_co_ban)) {
                $cbErr = "Chỉ bao gồm chữ số";
            }
        }

        if (empty($_POST["phu_cap"])) {
            $pcErr = "Chưa nhập phụ cấp";
        } else {
            $phu_cap = test_input($_POST["phu_cap"]);
            if (!preg_match("/^[0-9' ]*$/",$phu_cap)) {
                $pcErr = "Chỉ bao gồm chữ số";
            }
        }

        $tong_luong = $luong_co_ban + $phu_cap;
    }

    function checkErr($idErr, $cbErr, $pcErr) {
        if (!empty($idErr) || !empty($cbErr) || !empty($pcErr)) {
            return false;
        }
        return true;
    }

    if (isset($_POST['submit'])) {
        if (!empty($id_nv) && !empty($date)  && !empty($luong_co_ban) && !empty($phu_cap) && !empty($tong_luong) && checkErr($idErr, $cbErr, $pcErr)) {
            $query = "UPDATE luong_tbl 
            SET luong_co_ban='$luong_co_ban',phu_cap='$phu_cap',tong_luong='$tong_luong',ngay_cap_nhat='$date' WHERE id_luong=$id";

            $sql_connect->query($query);

            header("Location: salary.php");
            exit();
        }
    }


    if (isset($_SESSION['username']) && isset($_SESSION['user_type']) && $_SESSION['logged_in']) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
            <link rel="stylesheet" href="\assets\styles.css">
            <title>Home Page</title>
        </head>
        <body>

            <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="\Datatables\datatables.js"></script>
            <script src="\Datatables\datatables.min.js"></script>
            <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>


            <!-- Side Bar -->
            <div class="side_bar">
                <div class="container-fluid">
                    <div class="row flex-nowrap">
                        <div class="col-auto col-md-3 col-xl-2 col-2 bg-dark">
                            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                                <div class="title">
                                    <p>Hệ thống quản lý nhân viên</p>
                                </div>
                                <hr style="border: 2px solid white; min-width: 100%">
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="min-width: 100%">
                                    <li class="nav-item side-item">
                                        <a href="home.php" class="nav-link align-middle px-0 text-white">
                                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Trang chủ</span>
                                        </a>
                                    </li>
                                
                                    <li class="nav-item side-item">
                                        <a href="department.php" class="nav-link px-0 align-middle text-white">
                                            <i class="fs-4 bi bi-table"></i> <span class="ms-1 d-none d-sm-inline">Chức Vụ</span></a>
                                    </li>
                                    <li class="nav-item side-item">
                                        <a href="staff.php" class="nav-link px-0 align-middle text-white">
                                            <i class="fs-4 bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">Nhân Viên</span></a>
                                    </li>
                                    <li class="nav-item main-side-item">
                                        <a href="salary.php" class="nav-link px-0 aligln-middle text-white">
                                            <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline">Lương</span> </a>
                                    </li>
                                    <li class="nav-item side-item">
                                        <a href="leave.php" class="nav-link px-0 align-middle text-white">
                                            <i class="fs-4 bi bi-person-x"></i> <span class="ms-1 d-none d-sm-inline ">Nghỉ Phép</span> </a>
                                    </li>
                                </ul>

                                <hr style="border: 2px solid white; min-width: 100%">
                                <div class="dropdown pb-4">
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="\assets\img\default_avatar.svg" alt="hugenerd" width="50" height="50" class="rounded-circle">
                                        <span class="d-none d-sm-inline mx-3">Admin</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="#">New project...</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col py-3">
                            <h1>Lương</h1>

                            <hr style="border: 2px solid blue">
                            <br><br>

                            <div class="card card-registration">

                                <div class="card-body">  

                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sửa bảng lương</h3>
                                    <form method="post">

                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="form-outline">
                                                    <label class="form-label" for="firstName">ID Nhân Viên</label> <span class="error"> * <?php echo $idErr;?></span> 
                                                    <input type="text" name="id_nv" class="form-control form-control-lg" value="<?php echo $id_nv?>"/>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                                <div class="form-outline datepicker w-100">
                                                    <label for="birthdayDate" class="form-label">Ngày Cập Nhật</label> <span class="error"> * </span> 
                                                    <input type="date" class="form-control form-control-lg" name="date" />
                                                    
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-4 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="emailAddress">Lương Cơ Bản</label> <span class="error"> * <?php echo $cbErr;?></span> 
                                                    <input type="text" name="luong_co_ban" id="luong_co_ban" class="form-control form-control-lg" oninput="updateSalary(this.value)" value="<?php echo $luong_co_ban?>"/>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-md-4 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="phoneNumber">Phụ Cấp</label> <span class="error"> * <?php echo $pcErr;?></span> 
                                                    <input type="tel" name="phu_cap" id="phu_cap" class="form-control form-control-lg" oninput="updateSalary(this.value )" value="<?php echo $phu_cap?>"/>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="phoneNumber">Tổng Lương</label> <span class="error"> * </span> 
                                                    <input type="tel" name="tong_luong" class="form-control form-control-lg" id="tong_luong" value="<?php echo $tong_luong?>"/>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-success btn-lg float-end" type="submit" name="submit" value="Cập nhật" />
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>

                        </div>

                        </div>

                    </div>
                </div>
            </div>
        
                

            <script>
                function updateSalary(val) {
                    console.log(val);
                    let cb = document.getElementById('luong_co_ban').value === '' ? 0 : document.getElementById('luong_co_ban').value; 
                    let pc = document.getElementById('phu_cap').value === ''? 0 : document.getElementById('phu_cap').value;
                    document.getElementById('tong_luong').value = parseInt(cb) + parseInt(pc);
                }        

            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    }   
    else {
        header("Location: error.html");
        exit();
    }
?>
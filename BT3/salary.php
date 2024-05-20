<?php

    session_start();

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
                            <br>
                            <a href="add_salary.php" class="btn btn-lg btn-success">Thêm Mới</a>
                            <br><br><br>

                            <div class="card">

                                <div class="card-body">  

                                    <table id="staff_table" class="table table-striped table-hover">
                                        <thead style="position: sticky; top: 0; ">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Avatar</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Lương Cơ Bản</th>
                                                <th scope="col">Phụ Cấp</th>
                                                <th scope="col">Tổng Lương</th>
                                                <th scope="col">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                require_once('connect.php');

                                                $query1 = "select * from luong_tbl inner join nhan_vien_tbl on luong_tbl.id_nhanvien=nhan_vien_tbl.id_nv";
                                                $staff_result = $sql_connect->query($query1);

                                                while ($row = $staff_result->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['id_luong']; ?></th>
                                                        <td><img src="\assets\img\<?php echo $row['anh']; ?>" alt="user_avatar" height="50px" width="50px"></td>
                                                        <td><?php echo $row['ten']; ?></td>
                                                        <td><?php echo $row['luong_co_ban']; ?>đ</td>
                                                        <td><?php echo $row['phu_cap']; ?>đ</td>
                                                        <td><?php echo $row['tong_luong']; ?>đ</td>
                                                        <td>
                                                            <a href="edit_salary.php?id=<?php echo $row['id_luong']; ?>" class="btn btn-success px-4">Sửa</a>
                                                            <a onclick="return confirm('Bạn có chắc muốn xoá bảng lương này không?');" href="delete_salary.php?id=<?php echo $row['id_luong']; ?>" class="btn btn-danger px-4">Xoá</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            ?>

                                        </tbody>
                                        
                                        <script>
                                            $(document).ready( function () {
                                                new DataTable('#staff_table', {
                                                    language: {
                                                        info: 'Trang _PAGE_/_PAGES_',
                                                        infoEmpty: 'Không có dữ liệu',
                                                        infoFiltered: '(Lọc từ _MAX_ item)',
                                                        lengthMenu: 'Hiển thị _MENU_ item / trang',
                                                        zeroRecords: 'Không có item tương ứng',
                                                        search: 'Tìm kiếm'
                                                    }
                                                });
                                            } );
                                        </script>

                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            
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
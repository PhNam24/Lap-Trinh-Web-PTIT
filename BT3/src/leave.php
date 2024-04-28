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
            <link rel="stylesheet" href="\assets\styles.css">
            <title>Home Page</title>
        </head>
        <body>
            <!-- Side Bar -->
            <div class="side_bar fixed-top">
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
                                    <li class="nav-item side-item">
                                        <a href="salary.php" class="nav-link px-0 aligln-middle text-white">
                                            <i class="fs-4 bi bi-cash-coin"></i> <span class="ms-1 d-none d-sm-inline">Lương</span> </a>
                                    </li>
                                    <li class="nav-item main-side-item">
                                        <a href="leave.php" class="nav-link px-0 align-middle text-white">
                                            <i class="fs-4 bi bi-person-x"></i> <span class="ms-1 d-none d-sm-inline ">Nghỉ Phép</span> </a>
                                    </li>
                                </ul>

                                <hr style="border: 2px solid white; min-width: 100%">
                                <div class="dropdown pb-4">
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="\assets\img\defautl_avatar.svg" alt="hugenerd" width="50" height="50" class="rounded-circle">
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
                            <h3>Left Sidebar with Submenus</h3>
                            <p class="lead">
                                An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where only a single 
                                menu is be open at a time. While the sidebar itself is not toggle-able, it does responsively shrink in width on smaller screens.</p>
                            <ul class="list-unstyled">
                                <li><h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile</li>
                            </ul>
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
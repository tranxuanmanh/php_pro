<?php
session_start();
include("../connect.php");
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Shop</title>
    <link rel="stylesheet" href="./style/mystyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css"
        integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-info bg-opacity-25">
                <div class="col-lg-8 p-3">Thoi gian mo cua tu 8h den 22h</div>
                <div class="col-lg-4">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> Tài khoản
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if (isset($_SESSION["username"])) {
                                ?>

                                <li class="dropdown-item">Xin chao:<?php echo $_SESSION["username"] ?></li>

                                <?php

                                    if ($_SESSION["username"] == "admin") {
                                    ?>
                                <li>
                                    <a class="dropdown-item text-succes" href="../testAdmin.php">Chuyển đến Admin</a>
                                </li>
                                <?php
                                    }

                                    ?>
                                <li>
                                    <a class="dropdown-item text-succes" href="../dangxuat.php"
                                        onclick="return confirm('Ban co chac chan khong??')">Đăng xuất</a>
                                </li>
                                <?php
                                } else {
                                ?>
                                <li>
                                    <a class="dropdown-item text-warning text-center" href="../dangnhap.php">Đăng nhập
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-success text-center" href="../dangki.php">Đăng kí</a>
                                </li>
                                <?php
                                }
                                ?>



                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/?ref=homescreenpwa">facebook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/?ref=homescreenpwa">zalo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/?ref=homescreenpwa">intagram</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#">Phone:0972685517</a>
                        </li>

                    </ul>


            </nav>
        </div>
    </div>

    <div class="row gx-1 bg-info p-2">
        <nav class="navbar navbar-expand-lg">
            <div class="col-lg-4">
                <div class="w-100 ms-5">
                    <a class="" href="./header.php">
                        <img src="../logo2.png" alt="">
                    </a>
                </div>

            </div>
            <div class="col-lg-6">
                <form class="d-flex" method="GET" action="../timkiemsp.php">
                    <input class="form-control me-2 w-50" type="search" name="searchSP" placeholder="Tim kiem san pham">
                    <input class="btn btn-outline-success" type="submit" name="btnSearch" value="Tim kiem"></input>
                </form>
            </div>
            <div class="col-lg-2">
                <a href="../cart/showCart.php" class="btn btn-primary position-relative">
                    Giỏ hàng
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bag" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                    </span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php 
                        if(isset($_SESSION['count'])&&!empty($_SESSION['cart'])){
                            echo $_SESSION['count'];
                        }else{
                            echo 0;
                        }
                        
                        ?>
                    </span>
                </a>
            </div>
        </nav>
    </div>
    <div class="row">
        <nav class="navbar navbar-expand-lg ">
            <div class="col-8 p-3 mx-auto bg-secondary bg-opacity-50 rounded-top">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Danh muc san pham
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            //Select danh muc san pham 
                            $sql = "select * from loaisanpham where BiXoa=0";
                            $query = $conn->query($sql);
                            if ($query) {
                                while ($row = mysqli_fetch_array($query)) {
                                    echo
                                    "<li class='dropdown-item my-2 item w-100'>
                                    <a href='../danhmuc.php?id=" . $row['MaLoaiSanPham'] . "&page=1' class='text-decoration-none p-1 w-100 d-block'>" . $row['TenLoaiSanPham'] . "</a>
                                    </li>";
                                }
                            }

                            ?>
                        </ul>
                    <li class="nav-item">
                        <a class="nav-link text-primary btn btn-warning p-2 fs-6" href="../trangchu.php?page=1">Trang
                            chu</a>
                    </li>
                    <?php
                    $query2 = $conn->query($sql);
                    while ($row2 = mysqli_fetch_array($query2)) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-primary btn btn-warning p-2 fs-6"
                            href="../danhmuc.php?id=<?= $row2['MaLoaiSanPham'] ?>&page=1">
                            <?= $row2['TenLoaiSanPham'] ?>
                        </a>
                    </li>
                    <?php
                    }
                    ?>


                </ul>
            </div>
        </nav>
    </div>
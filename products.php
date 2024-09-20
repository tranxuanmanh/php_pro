<?php

$sql = "SELECT * FROM sanpham WHERE BiXoa=0";
global $total_pages;
$total_pages = 0;
if (isset($_GET['page'])) {
    //Neu ton tai Get['page] thi phan trang
    //So ban ghi moi trang
    $limit = 6;
    //Mac dinh la page 1
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Bat dau
    $start = ($page - 1) * $limit;
    //Tong so ban ghi
    $result3 = $conn->query("SELECT COUNT(*) AS total FROM sanpham WHERE BiXoa=0");
    //Chuyen sang kieu array key->value
    $row3 = $result3->fetch_assoc();
    //Lay 'total' se duoc tong so ban ghi tra ve
    $total_records = $row3['total'];
    // Tính tổng số trang
    $total_pages = ceil($total_records / $limit); //Lam tron len
    //Noi chuoi vao sql ban dau
    $sql .= " LIMIT $start, $limit";
}
// echo $sql;
$query = $conn->query($sql);
?>

<section style="background-color: #eee;">

    <div class="row p-2 gy-2 mt-2">
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3 col-lg-3 mb-2 mb-lg-0">

            <div class="card">
                <div class="d-flex justify-content-between p-2">
                    <p class="lead mb-0 text-danger">Hot</p>
                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                        style="width: 35px; height: 35px;">
                        <p class="text-white mb-0 small">-10%</p>
                    </div>

                </div>
                <img src="./Images/<?= $row["HinhURL"] ?>" class="card-img-top" alt="Laptop"
                    style="width:100%;height:130px" />
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="small"><a href="" class="text-muted">Laptop</a></p>
                        <p class="text-dark mb-0">Số lượng: <?= $row["SoLuong"] ?></h5>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0"><?= $row["TenSanPham"] ?></h5>

                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Giá bán</h6>
                        <p class="mb-0 fw-bold text-danger"><?= number_format($row["GiaSanPham"], 0, '.', '.')  ?> VNĐ
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="mb-0">Số lượt mua</h5>
                        <p class="text-dark mb-0"><?= $row["SoLuongDaBan"] ?>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">

                        <p class="text-dark mb-0">
                            <a href="./chitietsp.php?id=<?= $row['MaSanPham']?>" class="btn btn-info " style="text-decoration: none;">Xem chi tiết</a>
                            <a href="?id=<?= $row['MaSanPham']?>" class="btn btn-success theA" style="text-decoration: none;">Thêm vào giỏ hàng</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>



        <?php
        }
        ?>



    </div>
</section>


<div class="row">
    <div class="col-12">

        <ul style="display:flex;justify-content: center;list-style-type: none;">
            <li>Trang</li>
            <?php

            for ($i = 1; $i <= $total_pages; $i++) { ?>
            <li class="mx-2">
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            </li>

            <?php } ?>

        </ul>
    </div>
</div>
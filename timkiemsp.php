<?php
include("header.php");
if (isset($_GET["btnSearch"])) {
    $kq = $_GET["searchSP"];
    $sql = "select * from sanpham WHERE BiXoa=0 AND TenSanPham like '%$kq%'";
    $query = $conn->query($sql);
}
?>
<section style="background-color: #eee;">
    <h4>Ket qua tim kiem san pham <?php echo "<span class='text-danger'>$kq</span>"; ?></h4>
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
                                <a href="/" class="btn btn-info " style="text-decoration: none;">Xem chi tiết</a>
                                <a href="/" class="btn btn-success " style="text-decoration: none;">Thêm vào giỏ hàng</a>
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
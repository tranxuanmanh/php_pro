<?php
include("./header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "select * from loaisanpham where MaLoaiSanPham='$id'";
$query = $conn->query($sql);
$row = mysqli_fetch_array($query);

$sql2 = "select * from sanpham where BiXoa=0 AND MaLoaiSanPham='$id'";

if (isset($_GET['page'])) {
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $result3 = $conn->query("SELECT COUNT(*) AS total FROM sanpham WHERE BiXoa=0 AND MaLoaiSanPham='$id'");
    $row3 = $result3->fetch_assoc();
    $total_records = $row3['total']; //Lay tong so ban ghi
    // Tính tổng số trang
    $total_pages = ceil($total_records / $limit); //Lam tron len

    $sql2 .= " LIMIT $start, $limit";
}
echo $sql2;
$query2 = $conn->query($sql2);
?>
<div class="row">
    <div class="col-12 bg-success bg-opacity-25 m-2 p-2 text-center">
        Danh muc -> <?php echo $row['TenLoaiSanPham'] ?>
    </div>
</div>

<section style="background-color: #eee;">

    <div class="row p-2 gy-2 mt-2">
        <?php
        while ($row2 = mysqli_fetch_array($query2)) {
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
                <img src="./Images/<?= $row2["HinhURL"] ?>" class="card-img-top" alt="Laptop"
                    style="width:100%;height:130px" />
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="small"><a href="" class="text-muted">Laptop</a></p>
                        <p class="text-dark mb-0">Số lượng: <?= $row2["SoLuong"] ?></h5>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0"><?= $row2["TenSanPham"] ?></h5>

                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Giá bán</h6>
                        <p class="mb-0 fw-bold text-danger"><?= number_format($row2["GiaSanPham"], 0, '.', '.')  ?> VNĐ
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="mb-0">Số lượt mua</h5>
                        <p class="text-dark mb-0"><?= $row2["SoLuongDaBan"] ?>
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
<?php
include("./footer.php");

?>
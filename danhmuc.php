<?php
include("./header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "select * from loaisanpham where MaLoaiSanPham='$id'";
$query = $conn->query($sql);
$row = mysqli_fetch_array($query);


?>
<div class="row">
    <div class="col-12 bg-success bg-opacity-25 m-2 p-2 text-center">
        Danh muc -> <?php echo $row['TenLoaiSanPham'] ?>
    </div>
</div>
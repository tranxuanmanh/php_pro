
<?php 
include("header.php");

?>
<?php 
if(isset($_GET['id'])){
$id=$_GET['id'];
// $sql="SELECT * FROM sanpham WHERE MaSanPham='$id' AND BiXoa=0";
$sql = "SELECT sanpham.MaSanPham AS masp,sanpham.HinhURL,sanpham.TenSanPham,sanpham.GiaSanPham,sanpham.SoLuong,sanpham.BaoHanh,sanpham.MoTa ,
        hangsanxuat.TenHangSanXuat AS tenhang FROM `sanpham` INNER JOIN hangsanxuat ON sanpham.MaHangSanXuat=hangsanxuat.MaHangSanXuat 
        WHERE sanpham.MaSanPham='$id' AND hangsanxuat.BiXoa=0 AND sanpham.BiXoa=0";
$query=$conn->query($sql);
$row=mysqli_fetch_array($query);
}

?>

<div class="row mt-1 mx-2">
    <div class="col-lg-6  bg-primary bg-opacity-25 p-2 rounded-end-5 ">
        <div class=" " style="padding:10px ;width:100%">
            <a href="./trangchu.php?page=1" class="text-decoration-none">Trang chu</a> ->Chi tiet san pham->
            <span class="fw-bold"><?php echo $row["TenSanPham"] ?></span>
        </div>
    </div>
</div>

<div class="row gx-2 mt-1 mx-2" >
    <div class="col-lg-3 h-50  p-2 ">
        <img style="width:100%;height:60%" src="./Images/<?= $row['HinhURL']?>" alt="">
    </div>
    <div class="col-lg-7 h-50 mt-2 bg-info bg-opacity-50 p-3 rounded">
    <p>Tên sản phẩm : <span class="fw-bold"><?= $row['TenSanPham']?></span></p>
    <p>Tên hãng : <span class="fw-bold"><?= $row['tenhang']?></span></p>
    <p>Giá sản phẩm:<span class="fw-bold"> <?= number_format($row["GiaSanPham"], 0, '.', '.')?> VND</span></p>
    <p>Bảo Hành: <span class="fw-bold"><?= $row['BaoHanh']?> năm</span><p>
    <p>Số lượng: <span class="fw-bold"><?= $row['SoLuong']?> chiếc</span></p>
    <p>Mô tả:<br> <span class="fw-bold"><?= $row['MoTa']?></span></p>
    <a href="./cart/showCart.php?id=<?php echo $id?>" class="btn btn-success theA">Thêm vào giỏ hàng</a>
    <a href="./like.php?id=<?php echo $id?>" class="btn btn-danger">Yêu thích</a>
    </div>
    <div class="col-lg-2">
        <div class="text-center bg-info bg-opacity-25">
            <p class="fw-bold ">Sản phẩm đang hot</p>
            <img style="width:100%;height:120px;padding:0;margin:0" src="./Images/<?= $row['HinhURL']?>" alt="">
            <p><?= $row['TenSanPham']?></p>
        </div>
       
    </div>
</div>

<div class="row mx-2 ">
    <div class="col-lg-3 bg-success bg-opacity-50 p-2 rounded-end-5">
       <div class="text-primary fw-bold p-2  ">Sản phẩm cùng loại</div> 
    </div>
</div>
<div class="row p-2 gy-2 mt-2">
        <?php
        $sql2="SELECT * FROM sanpham ORDER BY RAND() LIMIT 8";
        $query2=$conn->query($sql2);
        while ($row = mysqli_fetch_array($query2)) {
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
                            <a href="./chitietsp.php?id=<?= $row['MaSanPham']?>" class="btn btn-success " style="text-decoration: none;">Thêm vào giỏ hàng</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>



        <?php
        }
        ?>



    </div>
    
<div class="row" style="position:fixed;top:30%;left:50%;right:50%;">
<div id="form-hidden" class="col-12" style="display:none;">
    <div class="btn btn-danger rounded-5 text-center " id="Thoat" style="position:absolute;top:-15px;right:-270px;">*</div>
    <?php 
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql2="SELECT * FROM sanpham WHERE MaSanPham='$id' AND BiXoa=0";
    $query2=$conn->query($sql2);
    $row2=mysqli_fetch_array($query2);
    ?>
    <form method="GET" action="./cart/showCart.php">
            <table class="table table-bordered table-primary w-75" >
                <tr>
                    <td>Id</td>
                    <td>
                    <input type="number" readonly="false" value="<?php echo $row2['MaSanPham'] ?>" name="id">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                    <input class='w-100' type="text" readonly="false" value="<?php echo $row2['TenSanPham'] ?>" name="name">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng mua</td>
                    <td>
                    <input type="number" value="" min=1 max=100 require name="quantity">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                    <input type="text" readonly="false" value="<?php echo $row2["GiaSanPham"]  ?>" name="price">VND
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" name="addCart" value="Them">
                        <input type="reset" class="bg-warning" value="Huy">
                    </td>
                </tr>
            </table>
        </form>


    <?php
    }
      
    ?>
        
</div>
</div>

<script type="text/javascript">
   let theForm=document.querySelector("#form-hidden");
   let theA=document.querySelector(".theA");
   let thoat=document.querySelector("#Thoat");
    theA.addEventListener("click",function(even){
    even.preventDefault();
    theForm.style.display = "block";
    document.style.opacity='0.2';
   });

   thoat.addEventListener("click",function(){
     theForm.style.display = "none"
   });
</script>

<?php
include("footer.php");




?>
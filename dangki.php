<?php include("./header.php") ?>
<?php
$rand = rand(3, 100);

if (isset($_GET['add'])) {
    $tendangnhap = $_GET['username'];
    $matkhau = $_GET['password'];
    $hoten = $_GET['hoten'];
    $diachi = $_GET['diachi'];
    $date = $_GET['ngaysinh'];
    $dienthoai = $_GET['dienthoai'];
    $email = $_GET['email'];
    $sql = "INSERT INTO `taikhoan`(`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `HoTen`, `DiaChi`, `DienThoai`, `Email`, `NgaySinh`, `Xoa`, `Quyen`) 
    VALUES ('$rand','$tendangnhap','$matkhau','$hoten','$diachi','$dienthoai','$email','$date',0,0)";
    $query = $conn->query($sql);
    if ($query) {
        echo "Dang ki thanh cong";
        echo "<a href='./dangnhap.php'>Quay lai dang nhap</a>";
    } else {
        echo "Dang ki that bai";
        echo "<a href='./dangki.php'>Quay lai dang ki</a>";
    }
}
//Con thieu check tai khoan da ton tai
?>


<div class="row">
    <div class="col-6 mx-auto">
        <h1>Dang ki tai khoan</h1>
        <form action="./dangki.php?do=singup" method="GET">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ten dang nhap</label>
                <input type="text" require class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mat Khau</label>
                <input type="password" require class="form-control" id="" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ho ten</label>
                <input type="text" require class="form-control" id="" name="hoten">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Dia chi</label>
                <input type="text" require class="form-control" id="" name="diachi">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngay sinh</label>
                <input type="date" require class="form-control" id="" name="ngaysinh">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Dien thoai</label>
                <input type="text" require class="form-control" id="" name="dienthoai">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" require class="form-control" id="" name="email">
            </div>

            <button type="submit" name="add" class="btn btn-primary">Dang ki</button>
        </form>
    </div>
</div>
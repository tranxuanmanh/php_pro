<?php
include('header.php');
if (isset($_SESSION['username'])) {
    echo 'Bạn đã đăng nhập rồi.';
    echo '<a href="./header.php">Click để quay về trang chủ</a>';
} else {
    $username = "";
    $password = "";
    //Xử lý đăng nhập
    if (isset($_POST['btnDangNhap'])) {

        //Lấy dữ liệu nhập vào
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        //Kiểm tra 
        $sql = "SELECT TenDangNhap, MatKhau,Quyen FROM taikhoan WHERE TenDangNhap='$username' AND MatKhau='$password'";
        $query = $conn->query($sql);
        $row = mysqli_fetch_array($query);
        $admin = $row["Quyen"];
        if ($query && $query->num_rows > 0) {
            if ($admin == "1") {
                $_SESSION['username'] = $username;

                echo "Dang nhap thanh cong";
                echo '<a href="./testAdmin.php">Sang trang Admin</a>';

                exit;
            }
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $password;
            echo "Dang nhap thanh cong";
            echo '<a href="./header.php">Tiep tuc mua hang</a>';
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu');</script>";
        }
    }
?>
<div class="row px-3 bg-warning" style="height: 60px;line-height:60px">
    <div class="col-12">
        <a href="/index.php" style="text-decoration: none;font-weight: bold;">Trang chủ</a> -> Đăng nhập tài khoản
    </div>

</div>
<div class="row mt-2">
    <div class="col-6 mx-auto p-4" style="background-color: white">
        <h2>Đăng nhập tài khoản</h2>
        <form action="./dangnhap.php?do=login" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control w-50" value="<?php echo $username ?>" id="username"
                    name="username">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control w-50" value="<?php echo $password ?>" id="pass"
                    name="password">
            </div>
            <input type="submit" class="btn btn-primary" value="Đăng nhập" name="btnDangNhap"></input>
            <a href="./dangki.php" class="text-danger btn border border-1 border-primary"
                style="text-decoration: none;">Đăng kí tài khoản</a>
        </form>
    </div>
</div>


<script type="text/javascript">
function Check() {
    let loi = " ";
    if (tendangnhap == " ") {
        loi += "Nhap ten dang nhap";

    }
    if (mk == " ") {
        loi += "Nhập password";
    }
    return loi;
}
</script>
<?php
}
?>
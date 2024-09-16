<?php
session_start();

// Hủy phiên làm việc
session_destroy();

// Tùy chọn: Xóa các biến session hiện tại
$_SESSION = array();

echo "Bn vua dang xuat";
?>
<a href="./header.php">Quay lai mua hang</a>
<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "Ten dang nhap la: " . $_SESSION['username'];
} else {
    echo "No";
}

?>


<h1>Dang xuat <a href="./dangxuat.php">Dang xuat</a></h1>


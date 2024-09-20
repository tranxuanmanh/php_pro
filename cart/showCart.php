<?php
include("./headerCart.php");
?>
<?php 
if(isset($_GET['addCart'])){
    $id=$_GET['id'];
    $name=$_GET['name'];
    $quantity=$_GET['quantity'];
    $price=(double)$_GET['price'];
   
}
if(isset($_SESSION['username'])){
    echo "Xin chao ".$_SESSION['username'];
}else{
    echo "Ban chua dang nhap tai khoan --->"."<a href='../dangnhap.php'> Dang nhap</a>";
}

?>
<?php 
function addsp($id,$ten,$soluong,$gia){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }else{
        if(isset($_SESSION['cart'][$id])){
            if(is_array($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['quantity']+=$soluong;
            }else{
                $_SESSION['cart'][$id]=array(
                    "name"=>$ten,
                    "quantity"=>$soluong,
                    "price"=>$gia
                );
            }
        }else{
            $_SESSION['cart'][$id]=array(
                    "name"=>$ten,
                    "quantity"=>$soluong,
                    "price"=>$gia
            );
        }
    }
}
if (isset($quantity) && isset($id) && isset($name) && isset($price)) {
    addsp($id, $name, $quantity,$price);
    //  header("Location: ".$_SERVER['PHP_SELF']);  // Chuyển hướng về trang hiện tại nhưng không có query string
    //  exit();  
}
//Tao ham xoa
function xoa($id){
    if(isset($_SESSION['cart'][$id])){
        unset($_SESSION['cart'][$id]);
        return true;
    }
    return false;

}
//Thuc thi ham xoa
if(isset($_GET['remove'])){
    $idXoa=$_GET['remove'];
    $bool=xoa($idXoa);
    if($bool){
        echo "<script type='text/javascript'> confirm('Xoa thanh cong');</script>";
    }
    
}
//Xoa ton bo gio hang
if(isset($_GET['clear'])){
    $_SESSION['cart']=null;
    unset($_SESSION['cart']);
}


?>










<div class="row mt-2">
    <h2 class="text-center text-primary">Gio hang cua ban</h2>
    <?php 
    if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
        echo "<div class='col-3 text-center'>
                <p> <a class='btn btn-info' href='../trangchu.php'>Tiep tuc mua hang</a></p>
             </div>
       
        ";
        echo "
        <div class='col-6 mb-2 mx-auto text-end'>
        <a href='#' class=' btn btn-warning'>Cap nhat gio hang</a>
         <a href='?clear' class='ms-2 btn btn-danger'>Xoa tat ca</a>
        </div>
        
        " ;
            echo '
             <div class="col-11 mx-auto">

        <table class="table table-bordered text-center " style="height:60%">

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Hinh anh</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Thanh tien</th>
                <th>Action</th>
            </tr>
';
        $thanhtien=0;
        $tongtien=0;
        $count=0;
        foreach($_SESSION['cart'] as $key=>$value){
            
            if(is_array($value)){  
             
            $name=$value['name'];
            $price=doubleval($value['price']);
            $quantity=intval($value['quantity']);
            $thanhtien=$price*$quantity;
            $tongtien+=$thanhtien;
            $tongtien=number_format($tongtien, 0, '.', '.') ;
            echo "
            <tr >
                <td>$key</td>
                <td class='text-start'>$name</td>
                <td style='width:300px'>
                    <img src='../Images/SSD-Samsung-1.jpg' alt='' style='width:55%;height:130px'>
                </td>
                <td>                  
                    <input type='number' value='$quantity' min='1' max='100' name='soluong'> san pham
                </td>
                <td class='w-auto'>$price</td>
                <td>$thanhtien</td>
                <td> <a href='?remove=$key' class='btn btn-'>Xoa</a>
                </td>
               
            </tr>            

            
            ";
    }else{
        echo "San pham ".$key ."bi loi";
    }
}
        echo "<tr >
        <td class='border-start-0 border-end-0 border-bottom-0' colspan='6' class='text-end'>Tong tien: <b>$tongtien VND</b></td>
        </tr>";
        
        
        
    echo "
        </table>
          
        </div>
        </div>";
        //Dem so luong san pham trong gio hang
      $_SESSION['count']=count($_SESSION['cart']);
      echo "
        <div class='col-6 mb-2 mx-auto text-end'>
        <a href='#' class=' btn btn-primary'>Thanh toan</a>
        
        </div>
        
        " ;
            
}else{
    echo "<p>Gio hang trong || Quay lai mua hang <a href='../trangchu.php'>Quay lai</a></p>";
}
    
    
    ?>
   




<?php 
include("./footerCart.php");

//print_r( $_SESSION['cart']);

?>
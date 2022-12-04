<?php 
include "../controllers/check_login.php";
include("../configs/connectdb.php");
include("fixSqlInject.php");
    $id=$_GET['id'];
    $trangthai = $_GET['trangthai'];
    echo $trangthai;echo'<br>';
    echo $id;echo'<br>';
    
        if(isset($_GET['id']) && isset($_GET['trangthai']))
        {
            $sql = "UPDATE orders SET  trangthai = '$trangthai' WHERE id ='$id' ";
            mysqli_query($conn, $sql);
            $_SESSION['thongbao'] ='<script>alert("Cập nhật trạng thái đơn hàng")</script>';
            $conn->close();
            header('Location:../views/layouts/admin/admin_qldh.php');
        }
        else 
        { 
            $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại")</script>';
            header("Location:../views/layouts/admin/admin_qldh.php");
        }
?>
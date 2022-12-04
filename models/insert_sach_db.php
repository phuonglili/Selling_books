<?php 
include "../controllers/check_login.php";
include("../configs/connectdb.php");
include "fixSqlInject.php";
    $masach = trim($_POST["masach"]);
    $tensach =trim( $_POST["tensach"]);
    $tacgia = trim($_POST["tacgia"]);
    $theloai = trim($_POST["theloai"]);
    $giatien = trim($_POST["giatien"]);
    $image = trim($_POST["image"]);
    $mota = trim($_POST["mota"]);
   

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');


    $mota= fixSqlInject($mota);
    $tensach= fixSqlInject($tensach);
    $tacgia= fixSqlInject($tacgia);
    $theloai= fixSqlInject($theloai);
    $image= fixSqlInject($image);
    $date= fixSqlInject($date);


    $reg_img = '/[\`\[\]\'\(\)\|\{\}\"\<\>]/';
    $reg_tacgia = '/[\`\-\=\[\]\~\@\#\$\%\^\*\(\)\{\}\?]/';
    $reg_giatien = '/^[0-9]+$/';
    $reg_mota = '/[\`\=\[\]\~\@\#\%\*\+\|\{\}\<\>]/';
    $reg_tensach = '/[\`\~\#\^\*\{\}\<\>]/';

        if (isset($_POST['submit']) &&
            $tensach !="" &&
            $tacgia !="" && 
            $theloai !="" &&
            $giatien !="" &&
            $image !="" &&
            $mota !="" &&
            $theloai !="--Thể Loại--"&&
            !preg_match($reg_tensach,$tensach)&& 
            !preg_match($reg_tacgia,$tacgia) && 
            preg_match($reg_giatien,$giatien) && 
            !preg_match($reg_mota,$mota) && 
            !preg_match($reg_img,$image) )
           
        {
            $sql = "INSERT INTO sach (tensach,tacgia,theloai,image,mota,giatien,ngaycapnhat) VALUES('$tensach','$tacgia','$theloai','$image','$mota','$giatien','$date')";
            mysqli_query($conn, $sql);
            $_SESSION['thongbao'] ='<script>alert("Thêm sách thành công")</script>';
            $conn->close();
            header('Location:../views/layouts/admin/admin_qls.php');
        }
        else 
        { 
            $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
            $conn->close();
            header("Location:../views/layouts/admin/insert_sach.php?masach=$masach");
        }
?>

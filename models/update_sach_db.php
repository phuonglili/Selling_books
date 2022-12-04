<?php 
include "../controllers/check_login.php";
include("../configs/connectdb.php");
include("fixSqlInject.php");
    $masach = trim($_POST["masach"]);
    $tensach = trim($_POST["tensach"]);
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
    $date= fixSqlInject($date);


    $reg_img = '/[\`\[\]\'\(\)\|\{\}\"\<\>]/';
    $reg_tacgia = '/[\`\-\=\[\]\~\@\#\$\%\^\*\(\)\{\}\?]/';
    $reg_giatien = '/^[0-9]+$/';
    $reg_mota = '/[\`\=\[\]\~\@\#\%\*\{\}\<\>]/';
    $reg_tensach = '/[\`\~\#\^\*\{\}\<\>]/';
    $reg_masach = '/^[0-9]+$/';

        if (isset($_POST['submit']) &&
            $tensach !="" &&
            $tacgia !="" && 
            $theloai !="" &&
            $giatien !="" &&
            $image !="" &&
            $mota !="" &&
            $masach !="" &&
            $theloai != "--Thể Loại--"&&
            !preg_match($reg_tensach,$tensach)&& 
            !preg_match($reg_tacgia,$tacgia) && 
            preg_match($reg_giatien,$giatien) && 
            !preg_match($reg_mota,$mota) && 
            preg_match($reg_masach,$masach) && 
            !preg_match($reg_img,$image) )
           
        {
            $sql = "UPDATE sach SET tensach = '$tensach', tacgia = '$tacgia', theloai = '$theloai', giatien = '$giatien', image = '$image', mota = '$mota', ngaycapnhat = '$date' WHERE masach ='${masach}'";
            mysqli_query($conn, $sql);
            $_SESSION['thongbao'] ='<script>alert("Cập nhật thông tin sách thành công")</script>';
            $conn->close();
            header('Location:../views/layouts/admin/admin_qls.php');
        }
        else 
        { 
            $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
            $conn->close();
            header("Location:../views/layouts/admin/update_sach.php?masach=$masach");
        }
?>
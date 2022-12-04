<?php 
include "../controllers/check_login.php";
include("../configs/connectdb.php");
include "fixSqlInject.php";
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $repassword = trim($_POST["repassword"]);
    $email = trim($_POST["email"]);

    $name= fixSqlInject($name);
    $phone= fixSqlInject($phone);
    $password= fixSqlInject($password);
    $repassword= fixSqlInject($repassword);
    $email= fixSqlInject($email);
    $username= fixSqlInject($username);

    $reg = '/^\w[a-zA-Z0-9\_]{0,16}$/';
    $reg_ht ='/[\`\-\=\[\]\;\,\.\/\!\~\@\#\$\%\^\&\*\(\)\+\|\{\}\:\"\<\>\?]/';
    $reg_phone = '/^(0)\d{9,}$/';
    $reg_email = '/^[a-zA-Z0-9][a-zA-Z0-9\_]+@[a-zA-Z]+(\.[a-zA-Z]+){1,3}$/';

        if (isset($_POST['submit']) &&
            $name !="" &&
            $phone !="" && 
            $username !="" &&
            $email !="" &&
            preg_match($reg,$username)&& 
            !preg_match($reg_ht,$name) && 
            $password == $repassword &&
            preg_match($reg_phone,$phone) && 
            preg_match($reg_email,$email)) 
        {
            if(isset($_POST['checkbox']))
            {
                if( $password !="" && $repassword !=""&&preg_match($reg,$password))
                {
                    $password = md5($password);
                    $sql = "UPDATE user SET password = '$password', name = '$name', phone = '$phone', email = '$email' WHERE username ='${username}'";
                    mysqli_query($conn, $sql);
                    $_POST['checkbox']=0;
                    $_SESSION['thongbao'] ='<script>alert("Cập nhật thông tin thành công")</script>';
                    header('Location:../views/layouts/admin/admin_qltk.php');
                }
            }
            else
            {
                if( $password =="" && $repassword =="")
                {
                    $sql = "UPDATE user SET name = '$name', phone = '$phone', email = '$email' WHERE username ='${username}'";
                    mysqli_query($conn, $sql);
                    $_POST['checkbox']=0;
                    $_SESSION['thongbao'] ='<script>alert("Cập nhật thông tin thành công")</script>';
                    header('Location:../views/layouts/admin/admin_qltk.php');
                }
            }
        }
        else 
        { 
            $_POST['checkbox']=0;
            $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
            header('Location:../views/layouts/admin/update_user.php');
        }

    $conn->close();
?>
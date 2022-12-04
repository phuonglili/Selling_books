<?php 
    include("../configs/connectdb.php");
    session_start();
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $reg = '/^\w[a-zA-Z0-9\_]{0,16}$/';

        if (isset($_POST['submit']) &&
            $username !="" &&
            $password !="" && 
            preg_match($reg,$username)&& 
            preg_match($reg,$password))
            
        {
            $password= md5($password);
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' AND level =1";
            $user = mysqli_query($conn,$sql);
            if ($row = mysqli_fetch_array($user))
            {
                $_SESSION['thongbao'] ='<script>alert("Bạn đã đăng nhập thành công")</script>';
                $_SESSION['admin'] = $username;
                header("Location:../views/layouts/admin/admin_qltk.php");
            }
            else
            {
                $_SESSION['thongbao'] ='<script>alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
                header("Location:../views/layouts/admin/admin.php");
            }
        }
        else 
        {
            $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại!")</script>';
            header("Location:../views/layouts/admin/admin.php");
        }

?>
<?php 
    include("../configs/connectdb.php");
    include "fixSqlInject.php";

    session_start();
    $phone = trim($_POST["phone"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $repassword = trim($_POST["repassword"]);
    $email = trim($_POST["email"]);

    $phone= fixSqlInject($phone);
    $password= fixSqlInject($password);
    $repassword= fixSqlInject($repassword);
    $email= fixSqlInject($email);
    $username= fixSqlInject($username);

    $reg = '/^\w[a-zA-Z0-9\_]{0,16}$/';
    $reg_phone = '/^(0)\d{9,}$/';
    $reg_email = '/^[a-zA-Z0-9][a-zA-Z0-9\_]+@[a-zA-Z]+(\.[a-zA-Z]+){1,3}$/';



    echo $phone;    echo'<br>';
    echo $username;echo'<br>';
    echo $password;echo'<br>';
    echo $email;echo'<br>';
    echo $repassword;echo'<br>';
    echo (isset($_POST['submit']));echo'<br>';

    if (isset($_POST['submit']) &&
        $phone !="" && 
        $username !="" &&
        $email !="" &&
        $password !="" && 
        $repassword !=""  && 
        preg_match($reg,$username)&&
        preg_match($reg,$password) && 
        $password == $repassword &&
        preg_match($reg_phone,$phone) && 
        preg_match($reg_email,$email)) 

        {
            $password= md5($password);
            $sql = "SELECT * FROM user WHERE username='$username' AND phone = '$phone' AND email = '$email'";
            $user = mysqli_query($conn,$sql);
            if ($row = mysqli_fetch_array($user))
            {
                $sql = "UPDATE user SET password = '$password' WHERE username ='${username}' AND phone = '$phone' AND email = '$email'";
                mysqli_query($conn, $sql);
                $_SESSION['alert'] ='<script>alert("Bạn đã đổi mật khẩu thành công")</script>';
                header("Location:../views/layouts/public/sign-in.php");
            }
            else
            {
                $_SESSION['alert'] ='<script>alert("Thông tin đã nhập không chính xác, vui lòng kiểm tra lại!")</script>';
                header("Location:../views/layouts/public/forgot.php");
            }
        }
        else 
        {
            $_SESSION['alert'] ='<script>alert("Vui lòng kiểm tra lại thông tin!")</script>';
            header("Location:../views/layouts/public/forgot.php");
        }

?>
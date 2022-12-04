<?php 
    include("../configs/connectdb.php");
    include("../controllers/check_login.php");
    include"fixSqlInject.php";
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $password= fixSqlInject($password);
    $username= fixSqlInject($username);

    $reg = '/^\w[a-zA-Z0-9\_]{0,16}$/';

    
        if (isset($_POST['submit']) &&
            $username !="" &&
            $password !="" && 
            preg_match($reg,$username)&& 
            preg_match($reg,$password))
            
        {
            $password= md5($password);
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $user = mysqli_query($conn,$sql);
            if ($row = mysqli_fetch_array($user))
            {
                // echo"Hello ".$row['name']."<br>Bạn đã đăng nhập thành công";
                //add trang chu ban sach
                 header("Location:../views/layouts/public/index.php");
            }
            else
            {
                $_SESSION['alert'] ='<script>alert("Tên đăng nhập hoặc mật khẩu không chính xác")</script>';
                 header("Location:../views/layouts/public/sign-in.php");
            }
        }
        else 
        {
            header("Location:../views/layouts/public/sign-in.php");
            $_SESSION['alert'] ='<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
        }
        $conn->close();
        $_SESSION['taikhoan'] = $username;
        
?>
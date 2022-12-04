<?php
session_start();
$mkc = $mkm = $email = $diachi = $msg = $phone_number ="";                    
if(!empty($_POST))
{
    $mkc = getPost('mkc');
    $mkm = getPost('mkm');
    $email = getPost('email');
    $diachi = getPost('address'); 
    $phone_number = getPost('phone_number');
    if(empty($mkc))
{
    $msg ="Thông báo: Mật khẩu không được để trống";
}
else{            
             $mkc = md5($mkc); 
             $taikhoan = $_SESSION['taikhoan'];
             $userExit = executeResult("select * from user where username ='$taikhoan' and password = '$mkc'");
             if($userExit == null)
              {
             $msg ="Thông báo: Mật khẩu không chính xác";
              }
             else{
             if(empty($mkm))
                {
                    $msg ="Thông báo: Cập nhật thông tin thành công";
                    $sql = "UPDATE user SET password = '$mkc',phone = '$phone_number',email = '$email' where password = '$mkc' and username = '$taikhoan'";
                    execute($sql);
                }
                else{
                    $mkm = md5($mkm);
                    $msg ="Thông báo: Cập nhật thông tin thành công";
                    $sql = "UPDATE user SET password = '$mkm',phone = '$phone_number',email = '$email' where password = '$mkc' and username = '$taikhoan'";
                     execute($sql);
                }
             
// echo $sql;
}
        }
              // $sql = "insert into user(password) values ('$mkm')";
              // execute($sql);}

}

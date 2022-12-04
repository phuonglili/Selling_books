<?php
     require_once("../../../configs/db/db_helper.php");
     require_once("../../../configs/utils/utility.php");
     require_once("doithongtin.php");
   if(!isset($_SESSION['taikhoan']))
   {
    header("location:sign-in.php");
   }
   $taikhoan = $_SESSION['taikhoan'];
   $sqn = "SELECT sach.tensach,sach.image,order_details.soluong,order_details.soluong,orders.trangthai,order_details.tongtien FROM order_details INNER JOIN orders on order_details.order_id = orders.id inner JOIN sach on sach.masach = order_details.masach where username = '$taikhoan'";
   $danhsachmuahang =  executeResult($sqn);
   $sqll = " select * from user where username = '$taikhoan'";
   $thongtinuser = executeResult($sqll); 
   foreach($thongtinuser as $user)
   {
    $phone = $user['phone'];
    $email = $user['email'];
   }
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Người dùng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/index.css" type="Text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/tai-khoan.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/user.css">
</head>
<style type="text/css">
    .btnxacnhan:hover{
        cursor: pointer;
    }
 
.thaydoithongtin{
    border-radius: 10px;
    border:1px solid black;
    width:500px;
    height:550px;
    background:#e3dffc;
    position: absolute;
    left: 1000px;
    top: 700px;
    z-index: 1;
}

</style>
<body>
    <div class="form1">
        <a href = "index.php" style=" text-decoration: none">  <h1> HHTTC.com</h1> </a>
        </a>
        <div class="timkiem">
        <form  action="search_book.php" method="post"class="form-inline ml-auto my-2 my-lg-0 mr-3">
                    <div class="input-group" style="width:  520px ;" >
                        <input name="searchbook" type="text" class="form-control" aria-label="Small"
                            placeholder="Nhập sách cần tìm kiếm...">
                        <div class="input-group-append">
                            <input type="submit" class="btn" name="submit"style="background-color: #CF111A; color: white;" value="Search">
                        </div>
                  
                    </div>
                </form>
        </div>
        </div>
        <div class="giohang" style = "margin-top:-48px;">
            <ul class="navbar-nav mb-1 ml-auto">

                <li class="nav-item giohang">
                    <a href="giohang.php"style=" text-decoration: none; color:red">

                        <div class="cart">
                            <img src="../../../assets/images/shopping-cart.png" height="30px" width="30px">
                            Giỏ Hàng
                        </div>
                    </a>

                </li>
            </ul>
        </div>
        <div class="taikhoan" style = "margin-top:-13px;">
            <ul class="navbar-nav mb-1 ml-auto">

                <li class="nav-item giohang" style=" text-decoration: none; color:red">
                    <a href="logout.php"style=" text-decoration: none; color:red">

                        <div class="cart">
                            <img src="../../../assets/images/log-out.png" height="30px" width="30px">
                            Log Out
                        </div>
                    </a>

                </li>
            </ul>

        </div>
    </div>
    <!-- <?php
    // session_destroy();
    ?> -->
    <p id="pthongtin" style = "margin-top:30px;margin-left: 250px;font-size: 30px; "><b> Danh sách mua hàng</b></p>
    <div class="thongtindonhang">
        <table class="table table-bordered" style = "width:980px;margin-left: 250px;">
            <tr id="tt1">
                <th>STT</th>
                <th>Tên Sách</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Giá Tiền</th>
                <th>Trạng Thái</th>
            </tr>
<?php
$index = 0;
foreach($danhsachmuahang as $item)
{
    $trangthai = $item['trangthai'];
    switch ($trangthai)
    {
    case '0':
        $trangthai = "<td style = 'color:#6a441f;'><b>Chờ xác nhận đơn hàng</b></td>";
        break;
    case '1':
        $trangthai = "<td style = 'color:red;'><b>Từ chối đơn hàng</b></td>";
        break;
    case '2':
        $trangthai = "<td style = 'color:green;'><b>Đã xác nhận đơn hàng</b></td>";
        break;}

    echo '<tr style = "font-size:30px;">
    <td >'.(++$index).'</td>
    <td>'.$item['tensach'].'</td>
    <td><img src = "'.$item['image'].'"style="height:130px;width:100px;"></td> 
    <td>'.$item['soluong'].'</td>  
    <td>'.number_format($item['tongtien']).'</td>
    '.$trangthai.'
</td>'
;}
?>
<!-- <td style = "color:red">'.$trangthai.'</td> -->
</table>
     </div>
    <form method="post" onsubmit = "return validate();">
    <div class ="thaydoithongtin" style ="position:absolute;top:690px;left:1300px;">
         <h3 style = "margin-top:20px;">Cập Nhật Thông Tin </h3>
        <div class="mk">
                <label>Mật khẩu hiện tại:</label>
                <input type="password" name="mkc" id="mkc"><br>
                <img id ="anh1" src = "https://cdn2.vectorstock.com/i/thumb-large/73/76/hidden-from-view-or-hide-files-icon-vector-24797376.jpg" style = "
                 width:32px;position:absolute;top:89px; left:430px; cursor:pointer;visibility: visible;"onclick = "showhidepassword1()">
                <img id ="anh2" src = "https://media.istockphoto.com/vectors/eye-icon-logo-look-and-vision-icons-vector-vector-id1142767802?k=20&m=1142767802&s=170667a&w=0&h=DkbhhB5J8EpAbeWp2eAo0WQkuXqM9qqJ5cRRalG4eFo=" style = "visibility: visible;width:32px;position:absolute;top:89px; left:430px;cursor:pointer;"onclick = "showhidepassword2()">
        </div>
        <div class="mkmoi">
                <label>Mật khẩu  mới:</label>
                <input type="password" name="mkm" id="mkm" style ="margin-left: 65px;"><br>
                <img id ="anh3" src = "https://cdn2.vectorstock.com/i/thumb-large/73/76/hidden-from-view-or-hide-files-icon-vector-24797376.jpg" style = "visibility: visible;width:32px;position:absolute;top:162px; left:430px; cursor:pointer;" onclick = "showhidepassword3()">
                <img id ="anh4" src = "https://media.istockphoto.com/vectors/eye-icon-logo-look-and-vision-icons-vector-vector-id1142767802?k=20&m=1142767802&s=170667a&w=0&h=DkbhhB5J8EpAbeWp2eAo0WQkuXqM9qqJ5cRRalG4eFo=" style = "visibility: visible;display:block;width:32px;position:absolute;top:162px;left:430px; cursor:pointer;" onclick = "showhidepassword4()">
        </div>
        <div class="sdt">
                <label>Số điện thoại:</label>
                <input  onblur = "regexsdt(this)"type="text" name="phone_number" id="sdt" value = " <?=$phone?>"><br>
        </div>
         <div class="email">
                <label>Email:</label>
                <input type="email" onblur = "regexemail(this)"  name="email" id="email" value = "<?=$email?>"><br>
         </div>
    
    <div id ="message" >
            <h3 id ="thongbao1" style = " color:red;margin-left:20px; margin-top:20px;font-size: 20px;"><?php echo $msg;?></h3> 

    </div>
    <button name ="submit" class ="btnxacnhan"style="margin-top:30px;" type ="submit">Xác Nhận</button>     
    </form>
    <script type="text/javascript">
       function showhidepassword2()
       {
              document.getElementById('mkc').setAttribute("type", "text");
              $("#anh2").css("visibility",  "hidden");
               $("#anh1").css("visibility",  "visible");
       }
       function showhidepassword4()
       {
             document.getElementById('mkm').setAttribute("type", "text");
             
              $("#anh4").css("visibility",  "hidden");
              $("#anh3").css("visibility",  "visible");
              
       }
       function showhidepassword1()
       {
             document.getElementById('mkc').setAttribute("type", "password");
             $("#anh1").css("visibility",  "hidden");
              $("#anh2").css("visibility",  "visible");
       }
       function showhidepassword3()
       {
             document.getElementById('mkm').setAttribute("type", "password");
             
             $("#anh3").css("visibility",  "hidden");
              $("#anh4").css("visibility",  "visible");
       }
       function regexsdt(x)
    {
        let reg = /^(0)\d{9,}$/;
        if(x.value.trim()==="" )  
        { document.querySelector('#thongbao1').innerText = "Thông báo: Vui lòng nhập số điện thoại"}  
        else if(!reg.test(x.value)) 
        {document.querySelector('#thongbao1').innerText = "Thông báo: Số điện thoại không hợp lệ"}  
    };
    function regexemail(x)
    {
        let regemail = /^[a-zA-Z0-9][a-zA-Z0-9\_]+@[a-zA-Z]+(\.[a-zA-Z]+){1,3}$/;
        if(x.value.trim()==="" )  
        { document.querySelector('#thongbao1').innerText = "Thông báo: Vui lòng nhập email"}  
        else if(!regemail.test(x.value)) 
        {document.querySelector('#thongbao1').innerText = "Thông báo: Email không hợp lệ"}  
    };
       
    </script>

</body>
</html>
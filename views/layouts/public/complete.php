<?php
     require_once("../../../configs/connectdb.php");
     require_once("../../../configs/db/config.php");
     require_once("../../../configs/utils/utility.php");
     session_start();
      if(!isset($_SESSION['taikhoan']))
    {
     header("location:sign-in.php");
    }    
     if(isset($_GET['id']))
     {
        $id = $_GET['id'];
     }
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Xác nhận thành công</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

</head>


<body>
    <div class="form1">
    <a href = "index.php" style=" text-decoration: none"><h1> HHCCT.com</h1></a>
        <div class="timkiem">
            <form action="search_book.php" method="post" class="form-inline ml-auto my-2 my-lg-0 mr-3">
                <div class="input-group" style="width:  520px ;">
                    <input name="searchbook" type="text" class="form-control" aria-label="Small"
                        placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <input type="submit" class="btn" name="submit" style="background-color: #CF111A; color: white;"
                            value="Search">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="giohang" style = "position:absolute; right:300px;top:70px">
            <ul class="navbar-nav mb-1 ml-auto">
                    <li class="nav-item giohang">
                        <a href="giohang.php" style=" text-decoration: none; color: red;" >
                            
                            <div class="cart"> 
                                <img src="../../../assets/images/shopping-cart.png" height="30px" width="30px"> 
                                    Giỏ Hàng
                            </div>
                        </a>
                        
                    </li>
                </ul>
        </div>
        <div class="taikhoan" style = "position:absolute; right:430px;top:68px">
            <ul class="navbar-nav mb-1 ml-auto">
                   
                    <li class="nav-item giohang">
                        <a href="user.php" style=" text-decoration: none; color:red;">
                            
                            <div class="cart"> 
                                <img src="../../../assets/images/user.png" height="30px" width="30px"> 
                                Tài khoản 
                                    
                           
                            </div>
                        </a>
                        
                    </li>
                </ul>

    </div>
</div>

    <div class=" text-center" style="font-family: 'Lobster', cursive; margin-top:100px">
        <h1 style="color: red">Bạn đã đặt sách thành công!</h1>
        <h1 style="color: red">Cảm ơn bạn chúng tôi sẽ giao sách cho bạn nhanh nhất</h1>
        <a href = "index.php" style=" text-decoration: none"><button class = "btn btn-outline-primary" style = "width:350px;height:70px ; font-size:40px; margin-top:100px">Quay lại trang chủ</h1></button></a>
    </div>


</body>

</html>
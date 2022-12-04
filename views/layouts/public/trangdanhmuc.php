<?php
     require_once("../../../configs/db/dbhelper.php");
     require_once("../../../configs/utils/utility.php");
     require_once("process_danhmuc.php");

 ?>   
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Danh mục</title>
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
    
</head>


<body>
    <div class="form1">
    <a href = "index.php" style=" text-decoration: none">  <h1> HHTTC.com</h1> </a>
        <div class="timkiem">
            <form class="form-inline ml-auto my-2 my-lg-0 mr-3">
                <div class="input-group" style="width: 520px;">
                    <input type="text" class="form-control" aria-label="Small" placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <button type="button" class="btn" style="background-color: #CF111A; color: white;">

                            <img src="../../../assets/images/magnifier.png" height="15px" width="15px">
                        </button>
                    </div>
                </div>
            </form>
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
<?php
            foreach($thongtinsach as $item)
            {  
                echo '<div style = "display:flex;float:left; margin-left:30px; margin-top:20px;">
                     <div style = "height:300px;"
                     <div style = "background-color:#f7f7f7;border-radius:5px;border:1px solid white; width:200px;">
                     <a href = "trangmuasach.php?id='.$item['masach'].'">
                     <img src= '.$item['image'].' style ="width:100%;margin-top:20px;height:200px;"></a>
                     <p style = "font-size:20px;"><b>'.$item['tensach'].'</b></p>
                     <p style = "font-size:20px;"><b>'.number_format($item['giatien']).'VNĐ</b></p>
                    </div></div></div>';
            }   
?>
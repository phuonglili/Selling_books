<?php
     require_once("../../../configs/db/dbhelper.php");
     require_once("../../../configs/utils/utility.php");
     $sql = "select * from sach";
     $toanbosach = executeResult($sql);
     
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/index.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tai-khoan.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">    
</head>
<style type="text/css">
    li{
        width: 200px;
    }
    #banner{
        width:100%;
        height:400px;
        margin-top:10px;
        position: relative;
        animation-name: example;
        animation-duration: 10s;
        animation-iteration-count: infinite;
    }
    @keyframes example {
  0%{background-image: url("https://sachcuvn.com/upload/banner_sachcuvn2.jpg")} 
  25%{background-image: url("https://sachcuvn.com/upload/banner_sachcuvn2.jpg")} 
  50%{background-image: url("https://www.netabooks.vn/Data/Sites/1/media/sach/covid19/covid19-banner-870-550.jpg")}
  75%{background-image: url("https://thaihabooks.com/wp-content/uploads/2018/09/Banner_HOI-SACH-HOANG-THANH-02-3.jpg")}  
  100%{background-image: url("http://bizweb.dktcdn.net/100/065/991/files/in-sach-gia-re-1.jpg?v=1568533918961")}
}
</style>
<body>
    <div class="form1" >
        <a href = "index.php" style="text-decoration:none;color:red;">
           <h1> HHTTC.com</h1> 
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
                                Đăng nhập                              
                            </div>
                        </a>
                        
                    </li>
                </ul>
    
    </div>
     
    </div>
    
<div class="btn-group" style="margin-left: 120px; width:200px;margin-top:30px;">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Danh Mục Sách
  </button>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=1">Kinh tế</a></li>
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=2">Lịch Sử</a></li>
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=3">Tâm Lý</a></li>
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=4">Văn Học</a></li>
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=5">Thiếu Nhi</a></li>
    <li><a class="dropdown-item" href="trangdanhmuc.php?id=6">Giáo Dục-Gia Đình</a></li>
  </ul>
</div>
    <div class = "container" id="banner">
        
    </div>
    <form method="post">
     <p style="margin-top:100px;font-size:30px;text-align:center;"><b>DANH SÁCH SẢN PHẨM</b></p>
    <div class="container">
        <div class="row" style ="">
       <?php
            foreach($toanbosach as $item)
            {
                echo '<div class="col-md-2 col-6">
                    
                    <div style = "background-color:#f7f7f7;border-radius:5px;border:1px solid white;">
                     <a href = "trangmuasach.php?id='.$item['masach'].'">
                     <img src= '.$item['image'].' style ="width:100%;margin-top:20px;height:200px;"></a>
                     <p style = "font-size:20px;"><b>'.$item['tensach'].'</b></p>
                     <p style = "font-size:20px;"><b>'.number_format($item['giatien']).'VNĐ</b></p>
                    </div></div>';
            }   
       ?>
         

       </div>
   </div>
   </form>
</body>
</html>

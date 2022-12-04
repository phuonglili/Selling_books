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

     $username = $_SESSION['taikhoan'];
     $sql = "SELECT * FROM  user WHERE username='$username'";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) 
     {

       while($row = $result->fetch_assoc()) 
         {
             $name = $row['name'];
             $phone = $row['phone'];
             $email = $row['email'];
        }
    }
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
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

    <div>
    <form method="post" onsubmit="return completeCheckout();">
        <div class="all" style=" margin-left:100px; margin-top:100px; margin-right:100px">
            <div class="row">
                <div class="col-8" >
                            <h3 style="color: blue;">Thông tin đơn hàng:</h3>
                            <table class="table "style ="margin-top:40px">
                                <tr>
                                    <th style="text-align:center">STT</th>
                                    <th>Tên Sách</th>
                                    <th style="text-align:center">Số lượng</th>
                                    <th style="text-align:center">Giá tiền</th>
                                    <th style="text-align:center">Thành tiền</th>
                                </tr>
                                <?php
                                    if(!isset($_SESSION['cart'])) {
                                    $_SESSION['cart'] = [];
                                    }
                                    $index = 0;
                                    $tongtien = 0;
                                    foreach($_SESSION['cart'] as $item) {
                                    echo '<tr >
                                    <td style="text-align:center">'.(++$index).'</td>
                                    <td>'.$item['tensach'].'</td>
                                    <td style="text-align:center"> '.$item['num'].' </td>
                                    <td style="text-align:center">'.number_format($item['giatien']).' VNĐ</td>
                                    <td style="text-align:center"><p id = "thanhtien">'.number_format($item['num']* $item['giatien']).' VNĐ</p></td>
                                    </tr>';
                                    $tongtien+=$item['num']* $item['giatien'];
                                    }
                                ?>
                            </table>
                            <h5 style="color: #CF111A; text-align: right; margin-right:50px">Tổng tiền: <?php echo number_format($tongtien) ?> VNĐ</h5>
                            <a href="thanhtoan.php"><button class="btn btn-primary w-50" name="submit" type="submit"style = "height:50px; font-size:25px; background-color:#CF111A">Xác nhận mua hàng</button></a>
                </div>
                <div class="col-4" style="padding-left: 20px; padding-right: 20px;">
                    <h3 required="true" style="color: blue; text-align:center">Thông tin khách hàng:</h3>
                    <h5 style="color: #CF111A;">Họ tên:</h5>
                    <input required="true"  name = "hoten" type="text" value = "<?php echo $name ?>"class="form-control">
                    <h5 style="color: #CF111A;">Email:</h5>
                    <input required="true"  name = "email" type="text" value = "<?php echo $email ?>" class="form-control">
                    <h5 style="color: #CF111A;">Số điện thoại:</h5>
                    <input required="true"  name = "phone" type="text" value = "<?php echo $phone ?>"class="form-control">
                    <h5 style="color: #CF111A;">Địa chỉ:</h5>
                    <input required="true"  name = "diachi" type="text" class="form-control">
                    <h5 style="color: #CF111A;">Ghi chú:</h5>
                    <textarea name = "mota" type="text" class="form-control" rows="7"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
	function completeCheckout() {
		$.post('ajax_request.php', {
			'action': 'checkout',
			'hoten': $('[name=hoten]').val(),
			'email': $('[name=email]').val(),
			'phone': $('[name=phone]').val(),
			'diachi': $('[name=diachi]').val(),
			'note': $('[name=note]').val()
		}, function() {
			window.open('complete.php', '_self');
		})

		return false;
	}
</script>

</body>

</html>
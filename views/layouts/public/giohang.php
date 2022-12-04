<?php
     session_start();
     require_once("../../../configs/db/dbhelper.php");
     require_once("../../../configs/utils/utility.php");
     if(!isset($_SESSION['taikhoan']))
   {
    header("location:sign-in.php");
   }
   require_once('../../../configs/connectdb.php');

$_SESSION['taikhoan'];
// $sql = "SELECT * FROM sach ";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) 
// {
//   while($row = $result->fetch_assoc()) 
//     {
//       $stt = $row['stt'];
//       $tensach = $row['tensach'];
//       $tacgia = $row['tacgia'];
//       $theloai = $row['theloai'];
//       $img = $row['image'];
//       $mota = $row['mota'];
//       $gia = $row['giatien'];
//       $masach = $row['masach'];
//       $date = $row['ngaycapnhat'];
//     }}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Giỏ hàng</title>
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

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th style="width:100px">Tên Sách</th>
				<th>Hình ảnh</th>
				<th>Số lượng</th>
				<th>Giá tiền</th>
				<th>Thành tiền</th>
				<th>Xóa</th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr >
    <td >'.(++$index).'</td>
    <td>'.$item['tensach'].'</td>
    <td><img src = "'.$item['image'].'"style="width:200px;"></td> 
    <td style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['masach'].', -1)">-</button>
				<input type="number" id="num_'.$item['masach'].'" value="'.$item['num'].'" class="form-control" style="width: 70px; border-radius: 0px" onchange="fixCartNum('.$item['masach'].')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['masach'].', 1)">+</button>
			</td>
    <td>'.number_format($item['giatien']).' VNĐ</td>
    <td><p id = "thanhtien">'.number_format($item['num']* $item['giatien']).' VNĐ</p></td>
	<td><button class="btn btn-danger" onclick="updateCart('.$item['masach'].', 0)">Xoá</button></td>
		</tr>';
}
?>
		</table>
		<a href="thanhtoan.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px;">TIẾP TỤC THANH TOÁN</button></a>
	</div>
</div>
<script type="text/javascript">
	function addMoreCart(id, delta) {
		num = parseInt($('#num_' + id).val())
		num += delta
		$('#num_' + id).val(num)

		updateCart(id, num)
	}

	function fixCartNum(id) {
		$('#num_' + id).val(Math.abs($('#num_' + id).val()))

		updateCart(id, $('#num_' + id).val())
	}

	function updateCart(productId, num) {
		$.post('ajax_request.php', {
			'action': 'update_cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
    
</script>


</body>

</html>
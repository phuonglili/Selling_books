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

     $sql = "SELECT * FROM sach Where masach = '$id'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {
        while($row = $result->fetch_assoc()) 
          {
            $tensach = $row['tensach'];
            $img = $row['image'];
            $mota = $row['mota'];
            $gia = $row['giatien'];
        }
    }
    

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thông tin sách</title>
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
                                Tài khoản 
                                    
                           
                            </div>
                        </a>
                        
                    </li>
                </ul>

        </div>
    </div>

                <div class = "row" style = "margin-top: 50px; margin-left:150px; margin-right:150px;">
                    <div class = "col-4">
                        <img style = "margin-left:10px" height =600px; width = 450px;  src = "<?php echo $img ?>">
                    </div>
                    <div class = "col-6">

                        <div style = "height:450px">
                            <div class="text-center" >
                            <h2 style = "color:red">Thông tin sách</h2>
                            </div>

                            <div>
                                <h4><?php echo $tensach ?></h4><br>
                            </div>
                            <div>
                                <p><?php echo $mota ?></p>
                            </div>
                        </div>    
                        <div>
                            <div>
                                <h3 style = "color:red">Giá Tiền :<?php echo number_format($gia) ?> VNĐ</h3>
                            </div>
                            <div>
                                <leabel>Số lượng</leabel>
                            <div style="display: flex;">
                                <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(-1)">-</button>
                                <input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;" onchange="fixCartNum()">
                                <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(1)">+</button>
                            </div>
                            </div>
                            <div>
                            <a href="giohang.php?id= <?php echo $id ?>">
                            <div style = "width:350px ; margin-top:20px">
                                <button onclick="addCart( <?php echo $id ?> , $('[name=num]').val())" class="btn btn-danger w-100">Mua</button></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

<script>
	function fixCartNum() {
		$('[name=num]').val(Math.abs($('[name=num]').val()))
	}


    function addCart(productID,num)
    {
        console.log(productID,num)
        $.post('ajax_request.php',
        {
            'action' : 'cart',
            'id' : productID,
            'num' :num  
        })
    }
    function addMoreCart(delta) {
		num = parseInt($('[name=num]').val())
		num += delta
		if(num < 1) num = 1;
		$('[name=num]').val(num)
	}

    

</script>
</body>
</html>
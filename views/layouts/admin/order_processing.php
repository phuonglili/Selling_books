<?php
include"../../../controllers/check_login.php";
include"../../books/admin/header.php";
?>
    <title>Quản lý đơn hàng</title>
</head>
<body>
    <div class="all">
        <div class="row">
            <?php include"../../../views/books/admin/body.php"; ?>
                <div class="col-12 col-sm-12 col-xxl-9">
                    <div class="right" style="min-width: 1087px;min-height: 890px">
                        <div class=" text-center  animate__animated animate__pulse animate__infinite animate__slow" role="alert">
                            <h2 style="color:blueviolet">Cuộc đời ta thay đổi theo hai cách: <br>Qua những người ta gặp và qua những cuốn sách ta đọc.<h2>
                        </div>
                        <div class=" animate__animated animate__bounceInDown">
                            <div class="text-center">
                                <img class="animate__animated animate__pulse animate__slow	 animate__infinite" src="../../../assets/images/book.png" width="200px">
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-8">
                                <?php 
                                    include '../../../models/order_processing_db.php';
                                ?>
                            </div>
                            <div class="col-4 ttkh">
                                    <h5 style = "color:blue">Tài khoản: <?php echo $username?></h5>
                                    <h5 style = "color:blue">Họ tên: <?php echo $hoten?></h5>
                                    <h5 style = "color:blue">SĐT: <?php echo $phone?></h5>
                                    <h5 style = "color:blue">Email: <?php echo $email?></h5>
                                    <h5 style = "color:blue">Địa chỉ: <?php echo $diachi?></h5>
                                    <h5 style = "color:blue">Ghi chú: <?php echo $note?></h5>
                                    <h5 style = "color:red">Tổng tiền: <?php echo $tongtien?> VNĐ</h5>
                                    <h5 style = "color:red">Trạng thái: <?php echo $trangthai?></h5>
                                    <div class = "text-center" style = "margin-top:10px">
                                    <a href = "../../../models/admin_order_processing_db.php?trangthai=2&id=<?php echo $id ?>" style="text-decoration: none">
                                    <button type="button" class="btn btn-outline-success" style = "margin-right:5px">Xác nhận</button>
                                    </a>
                                    <a href = "../../../models/admin_order_processing_db.php?trangthai=1&id=<?php echo $id ?>" style="text-decoration: none">
                                    <button type="button" class="btn btn-outline-danger" style = "margin-left:5px">Từ chối</button>
                                    </a>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION['thongbao']))
          {
            echo $_SESSION['thongbao'];
            unset($_SESSION['thongbao']);
          }
    ?>
<?php include"../../books/admin/footer.php";?>
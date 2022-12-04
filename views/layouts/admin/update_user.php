<?php include"../../books/admin/header.php";  
include"../../../controllers/check_login.php";
?>
<title>Sửa thông tin</title>
</head>
<body>
    <div class="all">
        <div class="row">
           <?php include"../../../views/books/admin/body.php";?>
<?php
    include("../../../configs/connectdb.php");
    if(isset($_GET['username']))
    {
        $username = $_GET['username'];
    }
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $user = mysqli_query($conn, $sql);
    mysqli_num_rows($user);
    $row = mysqli_fetch_array($user);
            $username = $row['username'];
            $password = $row['password'];
            $name = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $conn->close();
?>
            <div class="col-12 col-sm-12 col-xxl-9">
                <div class="right" style="min-width: 740px ;min-height: 890px">
                    <div class=" text-center  animate__animated animate__pulse animate__infinite animate__slow" role="alert">
                            <h2 style="color:blueviolet">Cuộc đời ta thay đổi theo hai cách: <br>Qua những người ta gặp và qua những cuốn sách ta đọc.<h2>
                    </div>
                    <div class="update animate__animated animate__bounceInDown">
                        <form action="../../../models/update_user_db.php" method="POST">
                            <div class="row">
                                <div class="text-center">
                                    <img class="animate__animated animate__pulse animate__slow	 animate__infinite" src="../../../assets/images/book.png" width="200px">
                                </div>
                                <div class="col-6">
                                    <h5>Tên đăng nhập</h5>
                                    <input oninput="oip(this)" onblur="obl_tk(this)" onfocus="ofc(this)" disabled
                                        class="form-control" type="text" value=<?php echo$username?> >
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6" style="display:none">
                                    <h5>Tên đăng nhập</h5>
                                    <input oninput="oip(this)" onblur="obl_tk(this)" onfocus="ofc(this)" name="username"
                                        class="form-control" type="text" value=<?php echo$username?> >
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6">
                                    <h5>Họ và tên</h5>
                                    <input oninput="oip(this)" onblur="obl_hoten(this)" onfocus="ofc(this)" name="name"
                                        class="form-control" type="text"value='<?php echo$name?>' >
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6">
                                    <h5>Số điện thoại</h5>
                                    <input oninput="oip(this)" onblur="obl_sdt(this)" onfocus="ofc(this)" name="phone"
                                        class="form-control" value=<?php echo$phone?> >
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6">
                                    <h5>Email</h5>
                                    <input oninput="oip(this)" onblur="obl_email(this)" onfocus="ofc(this)" name="email"
                                        class="form-control" type="email" value=<?php echo$email?> >
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6 dplnone dplnone1" >
                                    <h5>Mật khẩu</h5>
                                    <input oninput="oip(this)" onblur="obl_mk(this)" onfocus="ofc(this)" name="password"
                                        class="form-control" type="password" id="password" placeholder="Password">
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-6 dplnone dplnone1" >
                                    <h5>Nhập lại mật khẩu</h5>
                                    <input oninput="oip(this)" onblur="obl_remk(this)" onfocus="ofc(this)"
                                        name="repassword" class="form-control" id="repassword" type="password" placeholder="Confirm Password">
                                    <span class="form-message"></span>
                                </div>
                                <div class="checkbox-mk">
                                    <p><input onchange="dplnone(this)"  name ='checkbox' type = "checkbox">  Đổi mật khẩu</p>
                                </div>
                                <div>
                                    <button type="submit" name="submit" class="btn btn-update w-100 ">Sửa</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/js/main.js"></script>
<?php include"../../books/admin/footer.php";?>
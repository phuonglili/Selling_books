<?php include "../../books/public/header.php";?>
    <title>Đăng nhập</title>
</head>

<body>
    <div class="all">
        <div class="sign-in  animate__animated animate__bounceInDown">
            <form action = "../../../models/sign_in_submit.php" method = "POST">
                <div class="text-center">
                    <img class=" animate__animated animate__pulse animate__slow	2s animate__infinite	infinite"
                        src="../../../assets/images/book.png" width="200px">
                </div>
                <div>
                    <h5>Tên đăng nhập</h5>
                    <input required="true"  oninput="oip(this)" onblur="obl_tk(this)" onfocus="ofc(this)" name="username" class="form-control" type="text" placeholder="User name">
                    <span class="form-message"></span>
                </div>
                <div>
                    <h5>Mật khẩu</h5>
                    <input required="true"  oninput="oip(this)" onblur="obl_mk(this)" name = "password" onfocus="ofc(this)" class="form-control" type="password"
                        placeholder="Password">
                        <span class="form-message"></span>
                </div>
                <div><button   type="submit" name="submit" class="btn d-block w-100">Đăng nhập</button></div>
                
                <div class="text-center Signup">
                    <a onclick="drd()" class="forgot" href="forgot.php">Quên mật khẩu ?</a><br>
                    <span>Bạn chưa có tài khoản ? <a id="Sign-up" onclick="drd()" href="sign-up.php">Đăng ký</a></span>
                </div>
            </form>  
        </div>
    </div>

    <?php 
        session_start();
        if (isset($_SESSION['alert']))
        {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
        
    ?>
<?php include"../../books/public/footer.php"?>
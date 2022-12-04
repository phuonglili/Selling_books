<?php
        session_start();
        if (isset($_SESSION['admin']))
        {
            header('Location:admin_qltk.php');
        }
        include"../../books/admin/header.php"; 
?>
<title>Admin</title>
</head>
<body>
    <div class="all">
        <div class="row">
            <div class="col-12 col-sm-12 col-xxl-3">
                <div class="left"  style="min-width: 350px;min-height:890px">
                    <div class="alert alert-info animate__animated animate__pulse animate__infinite animate__slow"
                        role="alert">
                        <h2 style="color:red">Hi Admin ♥-♥<h2>
                    </div>
                    <div class="menu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" onclick="login_admin()" id="btn_qltk" aria-current="page"
                                    href="#">
                                    <div onmouseover="m_over(this)" onmouseout="m_out(this)"
                                        class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow"
                                        role="alert">
                                        <h2 style="color:rgb(63, 230, 99)">Quản lý tài khoản<h2>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" onclick="login_admin()" id='btn_qls' aria-current="page"
                                    href="#">
                                    <div onmouseover="m_over(this)" onmouseout="m_out(this)"
                                        class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow"
                                        role="alert">
                                        <h2 style="color:rgb(63, 230, 99)">Quản lý sách<h2>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" onclick="login_admin()" id='btn_qldh' aria-current="page"
                                    href="#">
                                    <div onmouseover="m_over(this)" onmouseout="m_out(this)"
                                        class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow"
                                        role="alert">
                                        <h2 style="color:rgb(63, 230, 99)">Quản lý đơn hàng<h2>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-xxl-9">
                <div class="right " style="min-width: 480px ;min-height: 890px">
                    <div class=" text-center  animate__animated animate__pulse animate__infinite animate__slow"
                        role="alert">
                        <h2 style="color:blueviolet">Cuộc đời ta thay đổi theo hai cách: <br>Qua những người ta gặp và
                            qua những cuốn sách ta đọc.<h2>
                    </div>
                    <div class="text-center">
                        <img class=" img1 animate__animated animate__pulse animate__slow	2s animate__infinite	infinite"
                            src="../../../assets/images/book.png" width="200px">
                    </div>
                        <div class="login animate__animated animate__backInRight">
                            <div class="text-center">
                                <h2 style="color : red">Đăng nhập nào admin</h2>
                            </div>
                                <form action="../../../models/admin_submit.php" method="post">
                                    <div>
                                        <h5>Tên đăng nhập</h5>
                                        <input oninput="oip(this)" onblur="obl_tk(this)" onfocus="ofc(this)"
                                            class="form-control" type="text" name="username" placeholder="User name">
                                        <span class="form-message"></span>
                                    </div>

                                    <div>
                                        <h5>Mật khẩu</h5>
                                        <input oninput="oip(this)" onblur="obl_mk(this)" onfocus="ofc(this)"
                                            name = password class="form-control" type="password" placeholder="Password">
                                        <span class="form-message"></span>
                                        <div><button id="btn-login" type="submit" name="submit"  class="btn d-block w-100 ">Đăng nhập</button>
                                        </div>
                                    </div>
                                </form>
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
       include"../../books/admin/footer.php";
    ?>
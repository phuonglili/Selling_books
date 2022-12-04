<?php
include"../../../controllers/check_login.php";
include"../../books/admin/header.php";
?>
    <title>Quản lý đơn hàng</title>
</head>
<body>
    <div class="all">
        <div class="row">
        <div class="col-12 col-sm-12 col-xxl-3">
    <div class="left" style="min-width: 350px;min-height:890px">
        <div class="alert alert-info animate__animated animate__pulse animate__infinite animate__slow" role="alert">
            <h2 style="color:red">Hi Admin ♥-♥<h2>
        </div>
        <div class="menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" id = "btn_qltk" aria-current="page" href="admin_qltk.php">
                        <div onmouseover="m_over(this)" onmouseout = "m_out(this)" class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                            <h2 style="color:rgb(63, 230, 99)">Quản lý tài khoản<h2>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id ='btn_qls' aria-current="page" href="admin_qls.php">
                        <div onmouseover="m_over(this)" onmouseout = "m_out(this)" class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                            <h2 style="color:rgb(63, 230, 99)">Quản lý sách<h2>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id = 'btn_qldh' aria-current="page" href="admin_qldh.php">
                        <div onmouseover="m_over(this)" onmouseout = "m_out(this)" class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                            <h2 style="color:rgb(63, 230, 99)">Quản lý đơn hàng<h2>
                        </div>
                    </a>
                </li> 
                              <li class="nav-item them">
                                <a class="nav-link active" id ='btn_qls' aria-current="page"  href="admin_qldh_trangthai.php?trangthai=0">
                                    <div onmouseover="m_over(this)" onmouseout = "m_out(this)" style ="margin-top:0px;margin-bottom:0px" class="alert alert-primary animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                                        <h4 style="color:rgb(63, 230, 99)">Chờ xác nhận<h4>
                                    </div>
                                </a>
                            </li> 
                            <li class="nav-item them" >
                                <a class="nav-link active" id ='btn_qls' aria-current="page"  href="admin_qldh_trangthai.php?trangthai=2">
                                    <div onmouseover="m_over(this)" onmouseout = "m_out(this)" style ="margin-top:0px;margin-bottom:0px" class="alert alert-primary animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                                        <h4 style="color:rgb(63, 230, 99)">Đã xác nhận<h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item them" >
                                <a class="nav-link active" id ='btn_qls' aria-current="page" href="admin_qldh_trangthai.php?trangthai=1">
                                    <div onmouseover="m_over(this)" onmouseout = "m_out(this)" style ="margin-top:0px;margin-bottom:0px" class="alert alert-primary animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                                        <h4 style="color:rgb(63, 230, 99)">Bị từ chối<h4>
                                    </div>
                                </a>
                            </li>
                <li class="nav-item">
                    <a class="nav-link active" id = "btn_qltk" aria-current="page" href="../../../controllers/logout.php">
                        <div onmouseover="m_over(this)" onmouseout = "m_out(this)" class="alert alert-info animate__animated animate__pulse animate__repeat-2 animate__slow" role="alert">
                            <h2 style="color:red">Đăng xuất<h2>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
            <div class="col-12 col-sm-12 col-xxl-9">
                <div class="right" style="min-width: 1087px;min-height: 890px">
                <form action="#" method="post">
                      <div class="row">
                        <div class = "col-11">
                            <input name="search" class="form-control" type="text" value = "<?php if(isset($_POST['search'])){echo $_POST['search'];}?>" placeholder="Tìm kiếm">
                        </div>
                        <div class="col">
                          <button name = 'submit' class="btn btn-update" style = "margin-top:5px">Tìm</button>
                        </div>
                        <?php
                        if(isset($_POST['search']) && trim($_POST['search']) !=="")
                        {
                          $search =trim($_POST['search']);
                          echo "<h5>Kết quả tìm kiếm cho từ khóa \"<span style=\"color:red\">$search</span>\" </h5>";
                        }
                        ?>
                      </div>
                    <form>
                    <?php 
                        include '../../../models/select_donhang_trangthai_db.php';
                    ?>
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
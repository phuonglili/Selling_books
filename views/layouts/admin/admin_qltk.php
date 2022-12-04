<?php include "../../../controllers/check_login.php";
include"../../books/admin/header.php";?>
<title>Quản lý tài khoản</title>
</head>
<body>
    <div class="all">
        <div class="row">
          <?php include"../../../views/books/admin/body.php"; ?>
            <div class="col-12 col-sm-12 col-xxl-9">
                <div class="right"style="min-width: 1087px;min-height:890px">
                <form action="admin_qltk.php" method="post">
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
                    </form>
                    <?php 
                        include '../../../models/select_user_db.php';
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
<?php include"../../books/admin/footer.php"; ?>
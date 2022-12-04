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
    if(isset($_GET['masach']))
    {
        $masach = $_GET['masach'];
    
    $sql = "SELECT * FROM sach WHERE masach = '$masach'";
    $user = mysqli_query($conn, $sql);
    mysqli_num_rows($user);
    $row = mysqli_fetch_array($user);
            $tensach = $row['tensach'];
            $tacgia = $row['tacgia'];
            $theloai = $row['theloai'];
            $image = $row['image'];
            $mota = $row['mota'];
            $giatien = $row['giatien'];
            $conn->close();
    }

?>
            <div class="col-12 col-sm-12 col-xxl-9">
                <div class="right" style="min-width: 600px ;min-height: 890px">
                    <div class=" text-center  animate__animated animate__pulse animate__infinite animate__slow" role="alert">
                            <h2 style="color:blueviolet">Cuộc đời ta thay đổi theo hai cách: <br>Qua những người ta gặp và qua những cuốn sách ta đọc.<h2>
                    </div>
                    <div class=" animate__animated animate__bounceInDown">
                        <form action="../../../models/update_sach_db.php" method="POST">
                            <div class="row">

                                <div class="text-center">
                                    <img class="animate__animated animate__pulse animate__slow	 animate__infinite" src="../../../assets/images/book.png" width="200px">
                                </div>

                                <div class="col-6">
                                    <h5>Mã sách</h5>
                                    <input  disabled
                                        class="form-control" type="text" value=<?php echo$masach?> >
                                    <span class="form-message"></span>
                                </div>

                                <div class="col-6" style="display:none">
                                    <input  name="masach"
                                        class="form-control" type="text" value=<?php echo$masach ?> >
                                    <span class="form-message"></span>
                                </div>

                                <div class="col-6">
                                    <h5>Tên sách</h5>
                                    <input oninput="oip(this)" onblur="obl_tensach(this)" onfocus="ofc(this)" name="tensach"
                                        class="form-control" type="text" value='<?php echo$tensach?>' >
                                    <span class="form-message"></span>
                                </div>

                                <div class="col-6">
                                    <h5>Tác giả</h5>
                                    <input oninput="oip(this)" onblur="obl_tacgia(this)"  onfocus="ofc(this)" name="tacgia"
                                        class="form-control" type="text" value='<?php echo$tacgia?>' >
                                    <span class="form-message"></span>
                                </div>
                                
                                <div class="col-6">
                                    <h5>Thể loại</h5>

                                    <select class="form-select form-control"  name="theloai" aria-label="theloai">
                                    <option selected value ="<?php echo $theloai;  ?>" ><?php echo $theloai;  ?></option>
                                    <option value="Kinh Tế">Kinh Tế</option>
                                    <option value="Tâm Lý">Tâm Lý</option>
                                    <option value="Văn Học Việt Nam">Văn Học Việt Nam</option>
                                    <option value="Văn Học Nước Ngoài">Văn Học Nước Ngoài</option>
                                    <option value="Thiếu Nhi">Thiếu Nhi</option>
                                    <option value="Giáo Dục - Gia Đình">Giáo Dục-Gia Đình</option>
                                    <option value="Lịch Sử">Lịch Sử</option>
                                    <option value="Văn Hóa Nghệ Thuật">Văn Hóa Nghệ Thuật</option>
                                    <option value="Khoa Học - Triết Học">Khoa Học - Triết Học</option>
                                    </select>

                                    <span class="form-message"></span>
                                </div>

                                
                                <div class="col-6">
                                    <h5>Giá tiền</h5>
                                    <input oninput="oip(this)" onblur="obl_giatien(this)"  onfocus="ofc(this)" name="giatien"
                                    class="form-control" type="text" value='<?php echo$giatien?>' >
                                    <span class="form-message"></span>
                                </div>

                                <div class="col-6">
                                    <h5>Hình ảnh</h5>
                                    <input oninput="oip(this)" onblur="obl_image(this)" onfocus="ofc(this)" name="image"
                                        class="form-control" type="text" id="link-img" value = '<?php echo $image?>'>
                                    <span class="form-message"></span>
                                </div>
                                
                                <div class="col-6">
                                    <h5>Mô tả</h5>
                                    <textarea oninput="oip(this)" onblur="obl_mota(this)" rows="15"  onfocus="ofc(this)" name="mota"
                                    class="form-control" type="text" ><?php echo$mota?> </textarea>
                                    <span class="form-message"></span>
                                </div>

                                <div class="col-6 text-center">
                                <input class="form-control" onchange ="choose_file(this)" type = 'file'accept ="image/jpg image/jpeg image/png image/gif" >
                                    <div> 
                                            <img id ='img' style = "padding-top:10px"  alt = "Vui lòng kiểm tra lại link ảnh" height = 320px src ='<?php echo $image?>'>
                                    </div>
                                    <div>
                                        <button type="submit" name="submit" class="btn btn-update w-100 ">Sửa</button>
                                    </div>
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
    ?>

    <script src="../../../assets/js/main.js"></script>
<?php include"../../books/admin/footer.php";?>
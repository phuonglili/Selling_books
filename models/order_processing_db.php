<?php 
include"../../../configs/connectdb.php";
if (!isset($_SESSION['admin']))
{
    header('Location:../../../views/layouts/admin/admin.php');
}
if(isset ($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "SELECT order_date FROM  orders  WHERE id =$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc(); 
    $date = $row['order_date'];
  }


  echo "<h4>Mã đơn hàng: $id </h4>";
  echo "<h4>Ngày đặt: $date</h4>";
  $stt=0;
 
  echo'<table id = "table" class="table table-bordered border-danger">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sách</th>
      <th scope="col">Tên sách</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá Tiền</th>
      <th scope="col">Tổng tiền</th>
    </tr>
  </thead>';
  $sql = "SELECT order_details.masach,tensach,image,soluong,order_details.giatien FROM  order_details INNER JOIN sach ON order_details.masach = sach.masach  WHERE order_id =$id ORDER BY id DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
      {
          $stt = ++$stt;
          $masach = $row['masach'];
          $tensach = $row['tensach'];
          $image = $row['image'];
          $soluong = $row['soluong'];
          $giatien = $row['giatien'];
          $tongtien = $giatien*$soluong;
          $giatien = number_format($giatien);
          $tongtien = number_format($tongtien);

        echo "<tr onclick = 'clr_dh(this)'>
        <td style='cursor:pointer'> ${stt}</td>
        <td style='cursor:pointer'>${masach}</td>
        <td style='cursor:pointer'>${tensach}</td>
        <td style='cursor:pointer'><img src='${image}' width = 200px></td>
        <td style='cursor:pointer'>${soluong}</td>
        <td style='cursor:pointer'>${giatien} VNĐ</td>
        <td style='cursor:pointer'>${tongtien} VNĐ</td>
        </tr>";
      }
  } 
  else 
  {
    echo "Không có dữ liệu";
  }
  echo "</table>";
  
      
        $sql = "SELECT  * FROM  orders  WHERE id =$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
          $row = $result->fetch_assoc();
          $hoten = $row['hoten'];
          $email = $row['email'];
          $phone = $row['phone'];
          $diachi = $row['diachi'];
          $note = $row['note'];
          $tongtien = $row['tongtien'];
          $tongtien = number_format($tongtien);
          $username = $row['username'];
          $trangthai = $row['trangthai'];

          if($row['trangthai']==0)
        {
            $trangthai = 'Chờ xác nhận';
        }
        else if($row['trangthai']==1)
        {
            $trangthai = 'Bị từ chối';
        }
        else if($row['trangthai']==2)
        {
            $trangthai='Đã xác nhận';
        }
        
        }
}
  else
  {
    $_SESSION['thongbao'] ='<script>alert("Vui lòng kiểm tra lại thông tin")</script>';
    header("Location: admin_qldh.php");
  }
  $conn->close();
?>
   
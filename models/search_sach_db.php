<?php 
include"../../../configs/connectdb.php";
include("fixSqlInject.php");
if (!isset($_SESSION['admin']))
{
    header('Location:../../../views/layouts/admin/admin.php');
}

if (isset($_POST["search"])){
  $search = $_POST["search"];
  $search= fixSqlInject($search);
}
else 
{
  $search ="";
}

  echo'<table id = "table" class="table table-bordered border-danger">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sách</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Thể loại</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Giá tiền</th>
      <th scope="col">Ngày cập nhật</th>
      <th scope="col">Tùy chỉnh</th>
    </tr>
  </thead>';
  $sql = "SELECT @row := @row + 1 AS stt, t.* FROM sach t, (SELECT @row := 0) r WHERE tensach LIKE BINARY '%$search%' OR tacgia LIKE BINARY '%$search%' OR theloai LIKE BINARY '%$search%' OR mota LIKE BINARY '%$search%' OR giatien LIKE BINARY '%$search%' OR ngaycapnhat LIKE BINARY '%$search%' ORDER BY masach DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {

    while($row = $result->fetch_assoc()) 
      {
        if($search =="")
        {
          $stt = $row['stt'];
          $tensach = $row['tensach'];
          $tacgia = $row['tacgia'];
          $theloai = $row['theloai'];
          $img = $row['image'];
          $mota = $row['mota'];
          $gia = $row['giatien'];
          $masach = $row['masach'];
          $date = $row['ngaycapnhat'];
  
          $gia = number_format($gia);
        }
        else
        {
          $stt = $row['stt'];
          $tensach = str_replace($search,"<span style='color:red'>${search}</span>",$row['tensach']);
          $tacgia = str_replace($search,"<span style='color:red'>${search}</span>",$row['tacgia']);
          $theloai = str_replace($search,"<span style='color:red'>${search}</span>",$row['theloai']);
          $img = $row['image'];
          $mota = str_replace($search,"<span style='color:red'>${search}</span>",$row['mota']);
          $gia = str_replace($search,"<span style='color:red'>${search}</span>",$row['giatien']);
          $masach = $row['masach'];
          $date = str_replace($search,"<span style='color:red'>${search}</span>",$row['ngaycapnhat']);
        }

        echo "<tr onclick = 'clr(this)'>
        <td style='cursor:pointer'> ${stt}</td>
        <td style='cursor:pointer'>${tensach}</td>
        <td style='cursor:pointer'>${tacgia}</td>
        <td style='cursor:pointer'>${theloai}</td>
        <td style='cursor:pointer'><img src = '${img}' width = 200px ></td>
        <td style='cursor:pointer'>${mota}</td>
        <td style='cursor:pointer'>${gia} VNĐ</td>
        <td style='cursor:pointer'>${date}</td>

        <td><a class = 'dplnone' id ='sua' style='text-decoration: none' href = '../../../views/layouts/admin/update_sach.php?masach=$masach'><button type='button' class='btn btn-outline-warning' style='margin:5px' disabled >Sửa</button></a>

        <a class = 'dplnone' id = 'xoa' style='text-decoration: none' href = '../../../models/delete_sach_db.php?masach=$masach'><button type='button' class='btn btn-outline-danger' style='margin:5px'disabled>Xóa</button></a></td>
        </tr>";
      }
  } 
  else 
  {
    echo "Không tìm thấy";
  }
  echo "</table>";
  $conn->close();

?>
   
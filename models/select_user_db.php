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
          <th scope="col">User name</th>
          <th scope="col">Password</th>
          <th scope="col">Họ tên</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Email</th>
          <th scope="col">Ngày tạo</th>
          <th scope="col">Tùy chỉnh</th>
        </tr>
      </thead>';
      $sql = "SELECT @row := @row + 1 AS stt, t.* FROM user t, (SELECT @row := 0) r WHERE (level = 0) AND (username LIKE BINARY '%$search%' OR name LIKE BINARY '%$search%' OR phone LIKE BINARY '%$search%' OR email LIKE BINARY '%$search%' OR ngaytao LIKE BINARY '%$search%' ) ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {

        while($row = $result->fetch_assoc()) 
          {
            if($search =="")
            {
              $stt = $row['stt'];
              $username = $row['username'];
              $username1 = $row['username'];
              $password = $row['password'];
              $name = $row['name'];
              $phone = $row['phone'];
              $email = $row['email'];
              $date = $row['ngaytao'];
            }
            else 
            {
              $stt = $row['stt'];
              $username = $row['username'];
              $username1 = str_replace($search,"<span style='color:red'>${search}</span>",$row['username']);
              $password = $row['password'];
              $name = str_replace($search,"<span style='color:red'>${search}</span>",$row['name']);
              $phone = str_replace($search,"<span style='color:red'>${search}</span>",$row['phone']);
              $email = str_replace($search,"<span style='color:red'>${search}</span>",$row['email']);
              $date = str_replace($search,"<span style='color:red'>${search}</span>",$row['ngaytao']);
            }

            echo "<tr onclick = 'clr(this)'>
            <td style='cursor:pointer'> ${stt}</td>
            <td style='cursor:pointer'>${username1}</td>
            <td style='cursor:pointer'>${password}</td>
            <td style='cursor:pointer'>${name}</td>
            <td style='cursor:pointer'>${phone}</td>
            <td style='cursor:pointer'>${email}</td>
            <td style='cursor:pointer'>${date}</td>
            
            <td><a class = 'dplnone' id ='sua' style='text-decoration: none' href = '../../../views/layouts/admin/update_user.php?username=$username'><button style='margin:5px' type='button' class='btn btn-outline-warning' disabled >Sửa</button></a>

            <a class = 'dplnone' id = 'xoa' style='text-decoration: none' href = '../../../models/delete_user_db.php?username=$username'><button style='margin:5px' type='button' class='btn btn-outline-danger'disabled>Xóa</button></a></td>
            </tr>";
          }
      } 
      else 
      {
        echo "Không có tài khoản nào";
      }
      echo "</table>";
      $conn->close();
?>
   
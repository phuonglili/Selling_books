<?php 
    include("../configs/connectdb.php");

    if(isset($_GET['username']))
    {
      $username =$_GET['username'];
    
    $sql = "DELETE FROM user WHERE username ='${username}'";
    $result = $conn->query($sql);
      header("Location:../views/layouts/admin/admin_qltk.php");
      $conn->close();
    }
    else
    {
      header("Location:../views/layouts/admin/admin_qltk.php");
    }
?>
    
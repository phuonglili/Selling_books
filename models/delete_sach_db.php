<?php 
    include("../configs/connectdb.php");

    if(isset($_GET['masach']))
    {
      $masach =$_GET['masach'];
    $sql = "DELETE FROM sach WHERE masach ='${masach}'";
    $conn->query($sql);

      header("Location:../views/layouts/admin/admin_qls.php");
      $conn->close();
    }
    else 
    {
      header("Location:../views/layouts/admin/admin_qls.php");
    }
?>
    
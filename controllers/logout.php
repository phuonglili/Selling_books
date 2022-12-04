<?php
    session_start();
    unset($_SESSION['admin']);
    header('Location:../views/layouts/admin/admin.php');
?>
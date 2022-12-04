<?php
session_start();
if (!isset($_SESSION['admin']))
{
    header('Location:../../../views/layouts/admin/admin.php');
}
?>
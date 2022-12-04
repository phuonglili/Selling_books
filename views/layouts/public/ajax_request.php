<?php
session_start();
include"../../../configs/utils/utility.php";
include"../../../configs/db/db_helper.php";


$action = getPost('action');

switch ($action) {
	case 'cart':
		addToCart();
		break;
	case 'update_cart':
		updateCart();
		break;
	case 'checkout':
		checkout();
		break;
}

function checkout() {
	if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
		return;
	}
	$hoten = getPost("hoten");
	$email = getPost("email");
	$phone = getPost("phone");
	$diachi = getPost("diachi");
	$note = getPost("note");

	$username = $_SESSION['taikhoan'];

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$order_date = date('Y-m-d H:i:s');

	$tongtien = 0;
	foreach($_SESSION['cart'] as $item) {
		$tongtien += $item['giatien'] * $item['num'];
	}

	$sql = "insert into orders (username,hoten,email,phone,diachi,note,order_date,trangthai,tongtien) values ('$username', '$hoten', '$email', '$phone', '$diachi', '$note', '$order_date', 0, '$tongtien')";
	execute($sql);

	$sql = "select * from orders where order_date = '$order_date'";


	$orderItem = executeResult($sql, true);

	$madonhang = $orderItem['id'];
	

	foreach($_SESSION['cart'] as $item) {
		$masach = $item['masach'];
		$giatien = $item['giatien'];
		$soluong = $item['num'];
		$tongtien = $giatien * $soluong;

		$sql = "insert into order_details (order_id,masach,giatien,soluong,tongtien) values ('$madonhang', '$masach', '$giatien', '$soluong', '$tongtien')";
		execute($sql);
	}
	unset($_SESSION['cart']);
}

function updateCart() {
	$id = getPost('id');
	$num = getPost('num');

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}

	for($i=0;$i<count($_SESSION['cart']);$i++) {
		if($_SESSION['cart'][$i]['masach'] == $id) {
			$_SESSION['cart'][$i]['num'] = $num;
			if($num <= 0) {
				array_splice($_SESSION['cart'], $i, 1);
			}
			break;
		}
	}
}

function addToCart() {
	$id = getPost('id');
	$num = getPost('num');

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	$isFind = false;
	for($i=0;$i<count($_SESSION['cart']);$i++) {
		if($_SESSION['cart'][$i]['masach'] == $id) 
		{
			$_SESSION['cart'][$i]['num'] += $num;
			$isFind = true;
			break;
		}
	}

	if(!$isFind) {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "bansach";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		mysqli_set_charset($conn,"utf8");

		$sql = "select * from sach where masach = '$id'";
		$result = mysqli_connect($servername, $username, $password, $dbname)->query($sql);
		if ($result->num_rows > 0) {
			$product = $result->fetch_assoc();
		}
		
		$product['num'] = $num;
		$_SESSION['cart'][] = $product;
	}
}
?>

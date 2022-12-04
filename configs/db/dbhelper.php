<?php
require_once('config.php');

function execute($sql)
{
	//open 
     $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
     mysqli_set_charset($conn, 'utf8');
     //query
     mysqli_query($conn, $sql);
     //close
     mysqli_close($conn);
}
function executeResult($sql) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);

	// $data = [];
	// while (($row = mysqli_fetch_array($resultset, 1)) != null) {
	// 	$data[] = $row;
	// }

	//Dong ket noi
	mysqli_close($conn);

	return $resultset;
}
?>
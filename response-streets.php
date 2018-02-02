<?php

$city_id = $_REQUEST['id'];
$db1 = mysqli_connect('localhost', 'root', '', 'test');
$query = "SELECT * FROM address WHERE city_id = " . $city_id;
$data = mysqli_query($db1, $query);
$data1 = mysqli_fetch_all($data);
if ($data1) {
	$res = json_encode($data1);
	echo $res;
}else{
	echo "No.";
}

?>
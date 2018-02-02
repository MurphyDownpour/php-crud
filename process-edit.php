<?php 
	$user_id = intval($_REQUEST['user_id']);
	$name = $_REQUEST['name'];
	$city = intval($_REQUEST['city']);
	$street = intval($_REQUEST['street']);

	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "UPDATE user SET name = '$name', city_id = $city, address_id = $street WHERE id = $user_id";
	$res = mysqli_query($db, $query);

?>
<?php

$name = $_REQUEST['name'];
$city = intval($_REQUEST['city']);

$street = intval($_REQUEST['street']);

$db = mysqli_connect('localhost', 'root', '', 'test');
$query = "INSERT INTO user (id, name, city_id, address_id) VALUES(null, '$name', $city, $street)";

$res = mysqli_query($db, $query);
print_r($res);
?>
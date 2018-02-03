<?php 

	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "SELECT name FROM user";
	$res = mysqli_query($db, $query);

	$data = mysqli_fetch_all($res);
	$names = json_encode($data);

	echo $names;

?>
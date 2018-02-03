<?php 

	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "SELECT user.id, user.name, city.city_name, address.address_name
			  FROM ((user
			  INNER JOIN city ON user.city_id = city.id)
			  INNER JOIN address ON address.id = user.address_id);";
	$data = mysqli_fetch_all(mysqli_query($db, $query));
	$result = json_encode($data);

	echo $result;
?>
<?php 

	$name = $_REQUEST['name'];
	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "SELECT * FROM user WHERE name = '$name';";
	$res = mysqli_query($db, $query);

	if (mysqli_num_rows($res) == 0) {
		echo 1;
	}
	else{
		echo 0;
	}

?>
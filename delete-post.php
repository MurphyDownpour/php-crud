<?php 

	$id = $_REQUEST['id'];
	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "DELETE FROM user WHERE id = " . $id;
	$res = mysqli_query($db, $query);

	if ($res) {
		echo "Deleted.";
	}

?>
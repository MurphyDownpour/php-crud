<?php 

	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query = "SELECT user.id, user.name, city.city_name, address.address_name
			  FROM ((user
			  INNER JOIN city ON user.city_id = city.id)
			  INNER JOIN address ON address.id = user.address_id);";
	$data = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Table</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <div class="container">
  	<h2 id="title">Data Table</h2>
 	<a href="/create.php" class="btn btn-primary" id="create">Create</a>
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>Name</th>
		    <th>City</th>
		    <th>Street</th>
		    <th>Functions</th>
		  </tr>
		</thead>
		<tbody>
			<?
				while ($users = mysqli_fetch_assoc($data)) { 
			 ?>
		  <tr>
		    <td><? echo $users['name']; ?></td>
		    <td><? echo $users['city_name']; ?></td>
		    <td><? echo $users['address_name']; ?></td>
		    <td>
		    	<a class="btn btn-warning edit" href="/edit-post.php?id=<? echo $users['id']; ?>">Edit</a>
		    	<button class="btn btn-danger delete" value="<? echo $users['id']; ?>">Delete</button>
		    </td>
		  </tr>
		  	<? } ?>
		</tbody>
	</table>
	<div id="modal">
		<h5>Successfully deleted.</h5>
	</div>
  </div>

	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>
</html>
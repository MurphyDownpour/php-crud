<?php 

	$id = $_REQUEST['id'];
	$db = mysqli_connect('localhost', 'root', '', 'test');
	$query1 = "SELECT user.id, user.name, city.id AS city_id, address.id AS address_id, city.city_name, address.address_name FROM user
INNER JOIN city ON user.city_id = city.id
INNER JOIN address ON user.address_id = address.id WHERE user.id = $id";
	$query2 = "SELECT * FROM city";

	$result1 = mysqli_query($db, $query1);
	$result2 = mysqli_query($db, $query2);

	$user = mysqli_fetch_array($result1);

	$query3 = "SELECT * FROM address WHERE city_id = " . $user['city_id'];
	$result3 = mysqli_query($db, $query3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="container">
		<h2>Edit Data</h2>
		<form id="form-edit">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="hidden" value="<? echo $user['id']; ?>" id="user_id">
				<input type="text" class="form-control" name="form_name" id="name" value="<? echo $user['name']; ?>">
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<select class="form-control" id="sel1" name="form_city">
					<option value="optional">==SELECT CITY==</option>
			        <?
			        	while ($cities = mysqli_fetch_assoc($result2)) {
							echo $cities['city_name'];
			        ?>
			        <option value="<? echo $cities['id']; ?>" <? 
			        if($user['city_id'] == $cities['id']) 
			        	echo "selected"; ?>><? echo $cities['city_name']; ?></option>
			        <? } ?>
		      	</select>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<select class="form-control" id="sel2" name="form_address">
			        <?
			        	while ($addresses = mysqli_fetch_assoc($result3)) {
			        ?>
					<option value="<? echo $addresses['id']; ?>" <? 
						if ($user['address_id'] == $addresses['id']) echo "selected"; 
					 ?>><? echo $addresses['address_name'] ?></option>
			        <? } ?>
		      	</select>
			</div>
			<button class="btn btn-success" id="edit">Submit</button>
			<a class="btn btn-danger" href="/">Back</a>
		</form>
		<div class="success">
			<p>New record was successfully added.</p>
		</div>
	</div>

	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="./js/post-edit.js"></script>
</body>
</html>
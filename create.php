<?php

$db = mysqli_connect('localhost', 'root', '', 'test');
$query1 = "SELECT * FROM city";
$result1 = mysqli_query($db, $query1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Data</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="container">
		<h2>Create Data</h2>
		<form id="form_create">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="form_name" id="name">
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<select class="form-control" id="sel1" name="form_city">
					<option selected>==SELECT CITY==</option>
			        <?
			        	while ($cities = mysqli_fetch_assoc($result1)) {
							echo $cities['city_name'];
			        ?>
			        <option value="<? echo $cities['id']; ?>"><? echo $cities['city_name']; ?></option>
			        <? } ?>
		      	</select>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<select class="form-control" id="sel2" name="form_address">
			        
		      	</select>
			</div>
			<button class="btn btn-success" id="post">Submit</button>
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
  <script src="./js/post-create.js"></script>
</body>
</html>
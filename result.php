<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>iHealthy - Results</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="main.css">
</head>

<body class="resultPage">

	<div class="topnav">
		<form method="post">
  		<input id="search-field" type="text" placeholder="Search" name="search">
  		<!--<input type="submit" name="submit">-->
  		<button type="submit" name= "submit"><img class="icon" src=img/icon.png></button></a>
  		</form>
	</div>

	<?php

$con = new PDO("mysql:host=ihealthy.16mb.com; dbname=u207738006_ihealthy",'u207738006_root', '123456');

if(isset($_POST["submit"])){
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `medicine` WHERE medicine_name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row =  $sth->fetch()){
		?>
		<!--<br><br><br>
		<table>
			<tr>
				<th>name</th>
				<th>image</th>
				<th>component</th>
				<th>sideeffect</th>
				<th>food</th>
			</tr>-->
	<div class="results">
		<h2>Result Listings</h2>

	</div>

	<div class="listing">
		<div class="medicineBox">
			<div class="medicinePic">
				<img src="img/icon.png">
			</div>
			<section class="medicineInfo">
				<td><?php echo $row->medicine_name; ?></td>
				<td><?php echo $row->medicine_component;?></td>
				<td><?php echo $row->medicine_sideeffect;?></td>
			</section>
		</div>

		<div class="foodResults">
			<div class="foodListing1">
				<div class="foodPic1">
					<img src="img/icon.png">
				</div>
				<section class="foodInfo">
					<td><?php echo $row->food;?></td>
					<p>info about food 1</p>
				</section>
			</div>
			<div class="foodListing1">
				<div class="foodPic1">
					<img src="img/icon.png">
				</div>
				<section class="foodInfo">
					<h3>Food Name 1</h3>
					<p>info about food 1</p>
				</section>
			</div>
		</div>
	</div>

				
				<!--<td><?php echo $row->medicine_image;?></td>-->
				
				
				
			<!--</tr>
		</table>-->
	<?php
	}
	else{
		echo "medicine does not exist";
	}
}
?>




	

</body>
</html>
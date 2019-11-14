<!DOCTYPE html>
<html>
<head>
		<title>Test Search</title>
</head>
<body>
	
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">

</form>
</body>
</html>

<?php

$con = new PDO("mysql:host=ihealthy.16mb.com; dbname=u207738006_ihealthy",'u207738006_root', '123456');

if(isset($_POST["submit"])){
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `medicine` WHERE medicine_name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row =  $sth->fetch()){
		?>
		<br><br><br>
		<table>
			<tr>
				<th>name</th>
				<th>image</th>
				<th>component</th>
				<th>sideeffect</th>
				<th>food</th>
			</tr>
				<td><?php echo $row->medicine_name; ?></td>
				<td><?php echo $row->medicine_image;?></td>
				<td><?php echo $row->medicine_component;?></td>
				<td><?php echo $row->medicine_sideeffect;?></td>
				<td><?php echo $row->food;?></td>
			</tr>
		</table>
	<?php
	}
	else{
		echo "medicine does not exist";
	}
}
?>

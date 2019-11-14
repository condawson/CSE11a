 <?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> iHealthy </title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="main.css">
</head>

<body>
	<nav>

		<?php    
			if(empty($_SESSION['uid']))
	    	{

	     	   echo '<a href="/login.php" class="button"><button type="submit">Log-in</button></a>
	     	   <a href="/register.php" class="button"><button type="submit">Sign-up</button></a>'; 
	    	}
	    	else
	    	{
	    		echo '<a href="/history.php" class="button"><button type="submit">Search History</button></a>'; 
	    	}
	    	

		?>
		
	</nav>

	<h1 class="">iHealthy</h1>


<div class="topnav">
  <input class="search-field" type="text" placeholder="Search">
  <button type="submit" class=""><img class="icon" src=img/icon.png></button>
</div>

<form class="upload" action="upload_file.php" method="post" enctype="multipart/form-data">
	<input class="file" type="file" name="file"><br>
	<input class="" type="submit" name="submit" value="convert">
</form>


</body>

</html>


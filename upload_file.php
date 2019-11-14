<?php


$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];

if ($_FILES["file"]["size"] < 20480000)   

{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "ERROR";
	}
	else
	{
		echo "SUCCESS";
		

		if (file_exists("upload/" $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " file already exist ";
		}
		else
		{
		
			$targetdir = '/CSE11a/';

			$targetfile = $targetdir . basename( $_FILES['file']['name']);

			move_uploaded_file($_FILES['file']['tmp'], $targetfile);
			echo "save as: " . "upload/" . $_FILES["file"]["name"];

			header("Refresh:5;url=/up/upload/");

		

		}
	}
}

?>

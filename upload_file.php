<?php
// 允许上传的图片后缀

$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
   // 获取文件后缀名
if ($_FILES["file"]["size"] < 20480000)   

{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "ERROR";
	}
	else
	{
		echo "SUCCESS";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " file already exist ";
		}
		else
		{
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			echo "save as: " . "upload/" . $_FILES["file"]["name"];

			header("Refresh:5;url=/up/upload/");

				//数据库连接
				/*$con = mysql_connect("localhost","u356980658_root","s13916175033");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

				mysql_select_db("my_db", $con);

				mysql_query("INSERT INTO files (file_name) 
				VALUES ('111')");

				

				mysql_close($con);
				*/

		}
	}
}

?>
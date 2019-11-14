<?php
session_start();
?>
THIS IS HISTORY PAGE

<?php

  echo'your id is'.$_SESSION['uid'].'<br></br>';

$servername = "213.190.6.127";
$username = "u207738006_root";
$password = "123456";
$dbname = "u207738006_ihealthy";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select * from history where user_id ='{$_SESSION['uid']}'";
$result = $conn->query($sql);

if ($result->num_rows <= 0)
{
  echo'No Search History';
} 

if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {
  $str = $row['search_content'];
  echo '<a href="/index.php">'.$str.'</a><br>';
  }
}
$conn->close();


?>
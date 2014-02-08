<?php
include 'core/init.php';
include 'includes/overall/header.php';



$user = $user_data['username'];


$user = $user_data['username'];
$query = mysql_query("SELECT * FROM messages WHERE to_user = '$user' ")or die(mysql_error());
while($row2 = mysql_fetch_array($query))
{ 
  echo "<table border=4>";
 
  echo "<tr><td>";
  echo "Message ID#: ";
  echo $row2['id'];
  echo "</tr></td>";
  echo "<tr><td>";
  echo "To: ";
  echo $row2['to_user'];
  echo "</tr></td>";
  echo "<tr><td>";
  echo "From: ";
  echo $row2['from_user'];
  echo "</tr></td>";
  echo "<tr><td>";
  echo $row2['message'];
  echo "</tr></td>";
  echo "<br>";
 }
  echo "</table>";
 
 
?>

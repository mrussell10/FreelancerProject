<?php
include 'core/init.php';
include 'includes/overall/header.php';

$id = mysql_real_escape_string($_GET['user_id']);
$query = 'SELECT `username` FROM `users` WHERE `user_id` = '.$id.' LIMIT 1';
$result = mysql_query($query);
$row = mysql_fetch_array($result);

// Echo page content
echo $row['username'];
?>


        <!-- we will create registration.php after registration.html -->
<table border="1">
  <tr>
    <td align="center">Job Posting Form</td>
  </tr>
  <tr>
    <td>
      <table>
          <form method="post" action="post_job.php">
        <tr>
          <td>Description</td>
          <td><input type="textarea" name="description" size="20">
          </td>
        </tr>
        <tr>
          <td>Budget</td>
          <td><input type="text" name="budget" size="40">
          </td>
        <tr>
          <td>Job type</td>
          <td><input type="text" name="job_type" size="40">
          </td>
        </tr>
        <tr>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="Sent"></td>
        </tr>
        </table>
      </td>
    </tr>
</table>
        
<?php

//inserting data order

$order = "INSERT INTO job(description,budget,username,job_type,user_id)
VALUES
('".$_POST["description"]."','".$_POST["budget"]."','".$user_data['username']."','".$_POST['job_type']."','".$uer_data['user_id']."')";

//declare in the order variable
$result = mysql_query($order);	//order executes
if($result){
	echo("<br>Job posted successfully");
} else{
	echo("<br>sorry an error has occured");
}
?>
</body>
</html>
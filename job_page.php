<?php
include 'core/init.php';
include 'includes/overall/header.php';
send_form ()
?>

<?php


echo "Job Information";
echo "<table border =1 >";
echo "<td>Username</td>";
echo "<td>Description</td>";
echo "<td>Budget</td>";
echo "<tr>";


$job_id = $_REQUEST['job_id'];
$job_query = mysql_query("SELECT * FROM job where job_id = $job_id") or die(mysql_error());
while ($row3 = mysql_fetch_array($job_query)) {


    echo "<td>" . $row3['username'] . "</td>";
    echo "<td>" . $row3['description'] . "</td>";
    echo "<td>" . $row3['budget'] . "</td>";
}

echo "</table>";
?>
<br>
<form method="POST" >
    To: <input type='text' name='to_user' value=<?php get_job_username(); ?>> <br> 
 From: <input type='text' name=<?php echo $user_data['username']; ?>> <br> 
 Title: <input type='text' value ="<?php get_job_title(); ?>"name='from_user'><br>  
 ID <input type='text' value ="<?php echo $_REQUEST['job_id']; ?>"name='from_user'> <br> 
 Message:<TEXTAREA NAME="message" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA><br> 
<input type="submit" value="submit" name="submit" />
</form>






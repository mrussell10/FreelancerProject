


<?php
include 'core/init.php';
include 'includes/overall/header.php';

"<table >";
$id = $_REQUEST['job_id'];

$query = mysql_query("SELECT * FROM job where job_id = $id") or die(mysql_error());
while ($row = mysql_fetch_array($query)) {


    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['description'] . "<td>";
    echo "<td>" . $row['budget'] . "<td>";
}
"</table>"
?>



<br>
<h1>Application Form</h1>
<form action="welcome.php" method="post">
    Name: <input type="text" name="name" value="<?php echo $user_data['first_name'] ?>"><br>
    Id: <input type="text" name="name" value="<?php echo $_REQUEST['job_id']; ?>"><br>
    E-mail: <input type="text" name="email" value=<?php echo get_job_title(); ?>><br>
    <textarea cols="40" rows="5" name="myname">
Now we are inside the area - This is for the cover letter.
    </textarea>
    <input type="submit">
</form>
</html>



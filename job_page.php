<?php
include 'core/init.php';
include 'includes/overall/header.php';
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
<form method="POST" action="" >
    <h1>Cover :</h1>
    <TEXTAREA NAME="pm" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA><br> 
<input type="submit" value="submit" name="submit" />
</form>


<?php
$sender = $user_data['username'];
//Selecting the username from the job database that corresponds with the job id//
$username_query = mysql_query("SELECT * FROM job where job_id = $job_id");
while ($row = mysql_fetch_array($username_query)) {

    $to_user = $row['username'];
    $title = $row['description'];
}


$from_user = $user_data['username'];


//Declaring the variable for the cover letter//
$pm = $_POST['pm'];

//If the cover letter is empty//
if (empty($pm) === true) {
    echo "Please fill in the cover letter";
} else
    $order = "INSERT INTO messages(from_user,to_user,message,title)
VALUES
('" . $from_user . "','" . $to_user . "','" . $pm . "','" . $title . "')";

//declare in the order variable
$result = mysql_query($order); //order executes
if ($result) {
    echo("<br>Your cover letter has been sucessfuly sent");
}
?>
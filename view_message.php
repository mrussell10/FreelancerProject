<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<?php
echo "Job Information";
echo "<table border =1 >";
echo "<td>Title</td>";
echo "<td>Message</td>";
echo "<td>From</td>";
echo "<tr>";


$message_id = $_REQUEST['message_id'];
echo $message_id;;
$update_read = mysql_query("UPDATE messages SET read_message = 'yes' WHERE message_id = $message_id") or die(mysql_error());

$job_query = mysql_query("SELECT * FROM messages where message_id = $message_id") or die(mysql_error());
while ($row3 = mysql_fetch_array($job_query)) {


    echo "<td>" . $row3['title'] . "</td>";
    echo "<td>" . $row3['message'] . "</td>";
    echo "<td>" . $row3['from_user'] . "</td>";
    
    $to_user = $row3['from_user'];
    $title = $row3['title'];
}

echo "</table>";
?>
<br>
<form method="POST" action="" >
    <h1>Reply :</h1>
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
    echo "Please fill in the message";
} else
    $order = "INSERT INTO messages(from_user,to_user,message,title)
VALUES
('" . $from_user . "','" . $to_user . "','" . $pm . "','" . $title . "')";

//declare in the order variable
$result = mysql_query($order); //order executes
if ($result) {
    echo("<br>Your message has been sucessfuly sent");
}

?>
<?php  
include 'core/init.php';

$user = $user_data['username'];
if (isset($_POST['delete'])) {
    $id = $_POST['id'];  
    mysql_query("UPDATE messages SET sent_deleted = 'yes' WHERE from_user = '$user' AND id = '$id'")or die(mysql_error());
    echo "Message succesfully deleted from your outbox.";
}
$user = $user_data['username'];
$sql = mysql_query("SELECT * FROM messages WHERE from_user = '$user' AND sent_deleted = 'no'")or die(mysql_error());

while($row = mysql_fetch_array( $sql ))
{
/* I have set each element into it's OWN echo statement for easy readind.
 however it is possible to create it in one echo statement like the following:
 echo "Message ID#: ".$row['id'];
*/
  echo "<table border=1>";
  echo "<tr><td>";
  echo "Message ID#: ";
  echo $row['id'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "To: ";
  echo $row['to_user'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "From: ";
  echo $row['from_user'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "Message: ";
  echo $row[message];
  echo "</td></tr>";
  echo "</br>";
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2></td></tr>
<tr><td></td><td>
<input type="hidden" name="id" maxlength="5" value = "<?php echo $row['id']; ?>">
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="delete" value="Delete PM # <?php echo $row['id']; ?> from outbox">
</td></tr>
</table>
</form>

<?php
}
  echo "</table>";
  echo "</br>";
?>
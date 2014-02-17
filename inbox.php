<?php

include 'core/init.php';
include 'includes/overall/header.php';

$user = $user_data['username'];


echo '</table>';

echo "<table class=gridtable>";
echo "<tr></tr>";
echo "<td>From</td>";
echo "<td>Title</td>";
echo "<td>View Message</td>";
echo "<td>Date</td>";
echo "<tr>";
$query = mysql_query("SELECT * FROM messages WHERE to_user = '$user' ") or die(mysql_error());

while ($row2 = mysql_fetch_array($query)) {
    
    echo "<td>" . $row2['from_user'] . "</td>";
    echo "<td>Re : " . $row2['title'] . "</td>";
    echo "<td>".'<a href="view_message.php?message_id='.$row2['message_id'].'">More Information</a>'."</td>";
    echo "<td>" . $row2['date'] . "</td>";
    echo "<tr>";
   
   
}

echo "</table>";

?>

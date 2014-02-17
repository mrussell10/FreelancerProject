<html>
<head>
  
</head>

</head>
<body>
    

    
<?php
include 'core/init.php';
include 'includes/overall/header.php';

echo "<table border =1 class=gridtable>";
echo "<td>Username</td>";
echo "<td>Description</td>";
echo "<td>Skills Required</td>";
echo "<td>Budget</td>";
echo "<td></td>";

$query = mysql_query("SELECT * FROM job")or die(mysql_error());
while($row2 = mysql_fetch_array($query))
        
{ 
echo "<tr>";
echo "<td>" . $row2["username"] . "</td>";
echo "<td>" . $row2["description"] . "</td>";
echo "<td>" . $row2["skill_type"] . "</td>"; 
echo "<td>" . $row2["budget"] . "</td>"; 
echo "<td>".'<a href="job_page.php?job_id='.$row2['job_id'].'">More Information</a>'."</td>";
 
 
}
echo "</table>";
?>


    
</body>

</html>
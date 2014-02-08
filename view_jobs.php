<head>
<style>
table,th,td
{
border:1px solid black;
border-spacing: 0.5rem;
border-collapse: collapse;
}
</style>
</head>

<?php
include 'core/init.php';
include 'includes/overall/header.php';

$query = mysql_query("SELECT * FROM job")or die(mysql_error());
while($row2 = mysql_fetch_array($query))
        
{ 

 "<ul>";
 echo "Username : ";
 echo $row2['username'];
 echo "<ul>";
 echo "Description: ";
 echo $row2['description'];
 echo "<ul>";
 echo "Budget: ";
 echo $row2['budget']; 
 echo "<ul>";
 echo "Apply: ";
 echo '<a href="job_page.php?job_id='.$row2['job_id'].'">More Information</a>';
 echo "<ul></ul>";
}

 
 
 
  ?>
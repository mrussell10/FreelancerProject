<?php
$connect_error = 'Sorry we are having some connection problems ';
// Connecting to the server //
mysql_connect('us-cdbr-azure-east-a.cloudapp.net','b2ce8924affcde','c9b78b72') or die ($connect_error);
// Connecting to the freelancer database //
mysql_select_db('techgigatamisebn')or die ($connect_error);

?>
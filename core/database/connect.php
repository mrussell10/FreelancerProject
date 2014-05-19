<?php
$connect_error = 'Sorry we are having some connection problems ';
// Connecting to the server //
mysql_connect('localhost','root','') or die ($connect_error);
// Connecting to the freelancer database //
mysql_select_db('freelancer')or die ($connect_error);

?>
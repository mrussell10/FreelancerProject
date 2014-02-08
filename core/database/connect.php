<?php
$connect_error = 'Sorry we are having some connection problems ';
mysql_connect('localhost','root','') or die ($connect_error);
mysql_select_db('freelancer')or die ($connect_error);

?>
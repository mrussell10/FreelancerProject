<?php

function get_job_title(){

$id = $_REQUEST['job_id'];

    $query = mysql_query("SELECT * FROM job where job_id = $id") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        echo $row['description'];
    }
}
function get_job_username(){

$id = $_REQUEST['job_id'];

    $query = mysql_query("SELECT * FROM job where job_id = $id") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        echo $row['username'];
    }
}

?>

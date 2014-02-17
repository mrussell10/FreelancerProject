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

function get_job_user_id(){

$id = $_REQUEST['job_id'];

    $query = mysql_query("SELECT * FROM job where job_id = $id") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        echo $row['user_id'];
    }
}

function send_form() {
    // Get values from form 
$to_user = $_POST['to_user'];
$from_user =$_POST['from_user'];
$message =$_POST['message'];
$title =$_POST['title'];
$id =$_POST['id'];

// Insert data into mysql 
$sql="INSERT INTO messages (to_user, from_user, message,title,id)VALUES('$to_user', '$from_user', '$message', '$title', '$id')";
$result=mysql_query($sql);
// if the data is inserted correctly "Successful" is displayed. 
if($result){
echo "Successful";
}
else{
    echo "error";
    
}
}

?>

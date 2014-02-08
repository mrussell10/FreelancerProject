<?php

//This is the directory where images will be saved 

$target = "images/"; 
$target = $target . basename( $_FILES['image']['name']); 

//This gets all the other information from the form 
$pic=($_FILES['image']['name']); 

mysql_query("UPDATE `users` SET `image` = ('$pic') WHERE `username` = $username");   ; 


 if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 
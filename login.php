<?php 
include 'core/init.php';?>

<?php


if (empty ($_POST) === false){

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$user_password=md5($password); 

if (empty($username) === true || empty($user_password) === true ){
    $errors = 'You need to enter a username and password';
    } else if (user_exists($username) === false) {
      $errors = 'We cant find that username';
     
	 } else {
	 
	 if(strlen ($user_password) > 32){
	      $errors = 'password too long';
	 }
	 
	$login = login ($username, $user_password);
	
	if($login === false) {
	
	$errors = 'That username/password combination is incorrect';
	 }else{
	 $_SESSION['user_id'] = $login;
	header( 'Location: ' . $username );
	 exit();

	 }
 }
	 
	 print_r($errors);
}

include 'includes/overall/header.php'
?>


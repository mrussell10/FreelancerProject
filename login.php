<?php 
include 'core/init.php';?>

<?php


if (empty ($_POST) === false){

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) === true || empty($password) === true ){
    $errors[] = 'You need to enter a username and password';
    } else if (user_exists($username) === false) {
      $errors[] = 'We cant find that username';
     } else if (user_active($username) === false) {
	 $errors[] = 'you havn\'t activated your account';
	 } else {
	 
	 if(strlen ($password) > 32){
	      $errors[] = 'password too long';
	 }
	 
	$login = login ($username, $password);
	
	if($login === false) {
	
	$errors[] = 'That username/password combination is incorrect';
	 }else{
	 $_SESSION['user_id'] = $login;
	 header('location: profile.php');
	 exit();

	 }
 }
	 
	 print_r($errors);
}

include 'includes/overall/header.php'
?>
markup

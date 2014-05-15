<?php

session_start();
error_reporting(1);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/messages.php';
require 'functions/users.php';


if (logged_in() === true) {
    //the user_id of the user for the session
    $session_user_id = $_SESSION['user_id'];
    //variable that contains all the users fields
    $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email','profile_pic','phone','county','overview','website','rate');
}



$errors = array();
?>
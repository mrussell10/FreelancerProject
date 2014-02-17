
<?php

     function change_profile_image($user_id, $file_temp, $file_extn) {
    $file_path = 'images/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
    move_uploaded_file($file_temp, $file_path);
    mysql_query("UPDATE `users` SET `profile_pic` = ' " .  mysql_real_escape_string($file_path) . " 'WHERE `user_id` =" . (int) $user_id);
}

function user_data($user_id) {
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);

        //adds back ticks to data to add flixability//
        $fields = "`" . implode('`,`', $func_get_args) . '`';
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = '$user_id'"));


        return $data;
    }
}

function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
    $username = ($username);
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
}

function user_active($username) {
    $username = ($username);
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) ? true : false;
}

function user_id_from_username($username) {
    $username = ($username);
    return mysql_result(mysql_query("SELECT `user_id` FROM `users` where `username` = '$username'"), 0, 'user_id');
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = ($username);
    $password = ($password);
///Had difficulty connecting here//
//Solution = validate code in phpmyadmin to make sure the sql statement runs without any errors.//
    return (mysql_result(mysql_query("SELECT COUNT('user_id') FROM users WHERE username ='$username' AND password ='$password'"), 0) == 1) ? $user_id : false;
}


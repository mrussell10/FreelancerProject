<?php
include 'core/init.php';
include 'includes/overall/header.php';


if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'first_name', 'last_name', 'email', 'category');
    ?>

    <h1><?php echo $profile_data ['first_name']; ?>'s Profile </h1>
    <h1><?php echo $profile_data ['email']; ?></h1>
    <h1><?php echo $profile_data ['category']; ?></h1>

    <?php
} else {
    header('location: index.php');
    exit();
}
?>
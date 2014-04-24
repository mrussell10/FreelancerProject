<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<h1> Manage your account </h1>
<div id="settings">
    <form name="settings" method="POST">
        <span> Widget : </span>
        <textarea id ="textbox" name="slideshow" value="" /></textarea>
        <input type="submit" value="update" />
    </form>
</div>

<?php
$slideshow = $_REQUEST['slideshow'];


if (empty($slideshow) === true) {
    echo "Insert flikr code";
} else
    $sql = mysql_query("UPDATE users SET slideshow = '$slideshow' WHERE username = '$username'");


//declare in the order variable
?>
<div id="personal_settings">
    <h3> Update personal settings</h3>
<form name="settings" method="POST">
    Email : <input type="text" name="email" value="" />
    <input type="submit" value="update" />
</form>


<?php
$email = $_REQUEST['email'];


if (empty($email) === true) {
    echo "fill email data to update";
} else
    $sql = mysql_query("UPDATE users SET email = '$email' WHERE username = '$username'");


//declare in the order variable
?>
    </div>
<p>
<div id="profile_photo" class="profile_pic">
    Change profile pic
    <?php
    if (isset($_FILES['profile_pic']) === true) {
        if (empty($_FILES['profile_pic']['name']) === true) {
            echo "Please choose a file";
        } else {
            $allowed = array('jpg', 'jpeg', 'gif', 'png');

            $file_name = $_FILES['profile_pic']['name'];
            $file_extn = strtolower(end(explode('.', $file_name)));
            $file_temp = $_FILES['profile_pic']['tmp_name'];

            if (in_array($file_extn, $allowed) === true) {

                change_profile_image($session_user_id, $file_temp, $file_extn);
            } else {
                echo "Incorrect file type";
            }
        }
    }
    if (empty($user_data['profile_pic']) === false) {

        echo '<img src = "', $user_data['profile_pic'], '" alt="">';
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_pic"/>
        <input type="submit"/>
    </form>

</div>
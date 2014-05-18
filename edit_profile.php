<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<style>
    img {
        height: 100px;
        width: 100px;
    }
</style>


<div class="col-md-4 col-lg-offset-4">
    <div class="btn-group btn-group-justified">
        <div class="btn-group">
            <a href="my_skills.php" class="btn btn-success" role="button">Manage Skills</a>
        </div>
        <div class="btn-group">
            <a href="my_portfolio.php" class="btn btn-warning" role="button">Manage Portfolio</a>
        </div>
    </div>
    <form role="form" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" value="<?php echo $user_data['role'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter your role - e.g Freelancer or Employer">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="<?php echo $user_data['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="website">Website Url</label>
            <input type="url" name="website" value="<?php echo $user_data['website'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter your website url">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" value="<?php echo $user_data['county'] ?>" class="form-control" id="location" placeholder="Enter the county you live in" >
        </div>

        <div class="input-group group-lg">

            <span class="input-group-addon">€</span>
            <input type="text" name="rate" value="<?php echo $user_data['rate'] ?>" class="form-control" placeholder="Enter the rate you charge per hour">
            <span class="input-group-addon">.00</span>
        </div>



        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?php echo $user_data['phone'] ?>" class="form-control" id="rate"  placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label for="overview">Overview</label>
            <textarea name="overview" rows="5" class="form-control" id="overview" placeholder="Enter a brief overview of yourself"><?php echo $user_data['overview'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Add Profile Picture</label>
            <input type="file" id="exampleInputFile" name="profile_pic">
            <p class="help-block">Upload your profile pic , it must be an image format</p>
        </div>


        <button type="submit" name='submit' class="btn btn-default">Submit</button>
    </form>



    <?php
    $name = $user_data['username'];
    //Requesting fields from form//
    $role = mysql_real_escape_string($_REQUEST['role']);
    $email = mysql_real_escape_string($_REQUEST['email']);
    $website = mysql_real_escape_string($_REQUEST['website']);
    $location = mysql_real_escape_string($_REQUEST['location']);
    $phone = mysql_real_escape_string($_REQUEST['phone']);
    $rate = mysql_real_escape_string($_REQUEST['rate']);
    $overview = mysql_real_escape_string($_REQUEST['overview']);

    //If the submit button is clicked//
    if (isset($_POST['submit'])) {

        //Insert the requested fields into the database//
        $sql = "UPDATE `users` SET `role`= '$role',`email`= '$email',`county`='$location',`phone`='$phone',`rate`='$rate',`website`='$website',`overview`= '$overview' WHERE username = '$username'";
        $result = mysql_query($sql);

        if ($result) {
            $updated_rows = mysql_affected_rows();
            if ($updated_rows > 0) {
                echo '<script type="text/javascript">window.location.replace("edit_profile.php");</script>';
            }
        }
    }
    ?>


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
                echo '<script type="text/javascript">window.location.replace("edit_profile.php");</script>';
            } else {
                echo "Incorrect file type";
            }
        }
    }
    ?>



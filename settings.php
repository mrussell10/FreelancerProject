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
<div class="col-md-6">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="<?php echo $user_data['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="website">Website Url</label>
            <input type="url" name="website" value="<?php echo $user_data['website'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="skill">Skill</label>
            <input type="url" name="website" value="<?php echo $user_data['website'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="overview">Overview</label>
            <textarea name="overview" rows="5" class="form-control" id="overview" ><?php echo $user_data['overview']?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile" name="profile_pic">
            <p class="help-block">Example block-level help text here.</p>
        </div>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>

  
    <?php
    $email = $_REQUEST['email'];
    if (empty($email) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET email = '$email' WHERE username = '$username'");


    $overview = $_REQUEST['overview'];
    if (empty($overview) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET overview = '$overview' WHERE username = '$username'");

    $phone = $_REQUEST['phone'];
    if (empty($phone) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET phone = '$phone' WHERE username = '$username'");

    $website = $_REQUEST['website'];
    if (empty($website) === true) {
        
    } else
        $sql = mysql_query("UPDATE users SET website = '$website' WHERE username = '$username'");
    
    
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
            } else {
                echo "Incorrect file type";
            }
        }
    }
    ?>



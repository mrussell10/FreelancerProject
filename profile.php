<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'address', 'town', 'county', 'overview', 'profile_pic', 'slideshow');
    ?>
    <style>
        .img-circle
        {
            height:140px;
            width:140px;
        }
    </style>

    <div class="container">
        <div class="span3 well">
            <center>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><?php echo '<img src = "', $profile_data['profile_pic'], '" alt=""  class="img-circle" >'; ?></a>
                <h3><?php echo $profile_data['username'] ?></h3>
                <em>"Something here"</em>
            </center>
        </div>

        <span><strong>Skills: </strong></span>
        <span class="label label-warning"> <?php
            $query = 'SELECT `skill_name` FROM `user_skills` WHERE user_id=' . $user_data['user_id'];
            $result = mysql_query($query) or die(mysql_error());


            while ($row = mysql_fetch_array($result)) {


                echo  $row["skill_name"] ;
                
            }
            ?></span>

    </center>
    <hr>
    <center>
        <p class="text-left"><strong>Bio: </strong><br>
            <?php echo $profile_data['overview'] ?></p>
        <br>
    </center>
    </div>
    <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">View Portfolio</button>
        </center>
    </div>
    </div>
    </div>
    </div>
    </div>



    <?php
} else {
    header('location: index.php');
    exit();
}
?>
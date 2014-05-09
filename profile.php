<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'county', 'overview', 'profile_pic', 'phone', 'website');
    ?>
    <style>
        .img-circle
        {
            height:140px;
            width:140px
        }
    </style>
    <div class="container-fluid">
        <div class="row span3 well">
            <div class="col-md-3 ">  <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><?php echo '<img src = "', $profile_data['profile_pic'], '" alt=""  class="img-circle" >'; ?></a></div>
            <div class="col-md-6"><h3>
                    <h2> <?php echo $profile_data['first_name'] ?> <?php echo $profile_data['last_name'] ?></h2>
                    <h3>"Something here"</h3><br><br>
                    </div>
                    <div class="col-md-3">

                        <b>Email : </b><?php echo $profile_data['email'] ?><br>
                        <b>Phone : </b><?php echo $profile_data['phone'] ?><br>
                        <b>Location : </b><?php echo $profile_data['county'] ?><br>
                        <b>Website : </b><?php echo $profile_data['website'] ?><br>
                    </div>
                    <div class="col-md-5">
                        <b>Overview : </b><?php echo $profile_data['overview'] ?>
                    </div>
            </div>
            <div class="col-md-3">
                <b>Skills : </b>
                <?php
                $sql = mysql_query("SELECT * FROM `user_skills` WHERE user_id = '9' AND removed =''");
                while ($row = mysql_fetch_array($sql)) {
                    echo "<table class='table table-striped'>";
                    echo "<td>". $row['skill_name']."</td>";
                    echo "</table>";
                  
                }
                ?>
            </div>
            <div class="col-md-5">
                <b>Portfolio : </b>
                
            </div>
        </div>



    <?php
} else {
    header('location: index.php');
    exit();
}
?>
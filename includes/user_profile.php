<?php

include 'core/init.php';
include 'includes/overall/header.php';
?>
<style>

    .img-circle
    {
        height:140px;
        width:140px
    }
    .img-thumbnail
    {
        height:240px;
        width:240px
    }
</style>
<div class ="col-md-11">
    <div class="container-fluid">
        <div class="row span3 well">
            <div class="col-md-4 ">  <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><?php echo '<img src = "', $profile_data['profile_pic'], '" alt=""  class="img-circle" >'; ?></a></div>
            <div class="col-md-6"><h3>
                    <h2> <?php echo $profile_data['first_name'] ?> <?php echo $profile_data['last_name'] ?></h2>
                    <h3>"Something here"</h3><br><br>
                    </div>
                    <div class="col-md-2">
                        <h4> <span class="label label-primary"> <b>€ <?php echo $profile_data['rate'] ?> Hourly Rate </b></h4></span>

                    </div>
                    <div class="col-md-4">
                        <span class="label label-info">Contact Information</span><br><br>

                        <span class="glyphicon glyphicon-envelope"> <br></span><b>Email : </b><?php echo $profile_data['email'] ?><br>
                        <span class="glyphicon glyphicon-phone"> <br></span><b>Phone : </b><?php echo $profile_data['phone'] ?><br>
                        <span class="glyphicon glyphicon-globe"> <br></span><b>Location : </b><?php echo $profile_data['county'] ?><br>
                        <span class="glyphicon glyphicon-picture"> <br></span><b>Website : </b><?php echo $profile_data['website'] ?><br>
                    </div>
                    <div class="col-md-5">
                        <b>Overview : </b><?php echo $profile_data['overview'] ?>
                    </div>
            </div>
            <div class="col-md-3">

                <span class="label label-info">Skills</span><br><br>
                <?php
                $user_id = $profile_data['user_id'];
                $sql = mysql_query("SELECT * FROM `user_skills` WHERE user_id = '$user_id' AND removed =''");
                while ($row = mysql_fetch_array($sql)) {
                echo "<table class='table table-striped'>";
                echo "<td>" . $row['skill_name'] . "</td>";
                echo "</table>";
                }
                ?>
            </div>
            <div class="col-md-9">
                <span class="label label-info">Portfolio</span><br><br>


                <?php
                $user_id = $profile_data['user_id'];
                $sql = mysql_query("SELECT * FROM `portfolio` WHERE user_id = '$user_id' AND removed =''");
                while ($row = mysql_fetch_array($sql)) {
                echo "<table >";
                echo "<td><a href ='". $row['location'] ."'><img src = '" . $row['location'] . "' class='img-thumbnail'></a>";
                echo "<td>";
                }
                ?>
              
            </div>

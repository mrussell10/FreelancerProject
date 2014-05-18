<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];

    if (user_exists($username) === true) {

        $user_id = user_id_from_username($username);
        $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'county', 'overview', 'profile_pic', 'phone', 'website', 'user_id', 'rate', 'role');
    } else {
        include 'redirect.php';
    }
    ?>
    <style>

        .img-circle
        {
            height:130px;
            width:130px
        }
        .img-thumbnail
        {
            height:240px;
            width:240px
        }
    </style>
    <div class ="col-md-10">
        <div class="container-fluid">
            <div class="row span3 well">
                <div class="col-md-4">  <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><?php echo '<img src = "', $profile_data['profile_pic'], '" alt=""  class="img-circle" >'; ?></a></div>
                <div class="col-md-5">
                    <h1><?php echo $profile_data['first_name'] ?> <?php echo $profile_data['last_name'] ?> </h1></div>
                <div class="col-md-2">
                    <h4> <span class="label label-primary"> <b>€ <?php echo $profile_data['rate'] ?> Hourly Rate </b></h4></span>

                </div>
                <div class="col-md-4">
                    <h4><b><?php echo $profile_data['role'] ?></b></h4></span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class ="col-md-10">
        <div class="container-fluid">
            <div class="col-md-4 ">
                <span class="label label-info">Contact Information</span><br><br>
                <span class="glyphicon glyphicon-envelope text-warning"> <br></span><b>Email : </b><?php echo $profile_data['email'] ?><br>
                <span class="glyphicon glyphicon-phone text-danger"> <br></span><b>Phone : </b><?php echo $profile_data['phone'] ?><br>
                <span class="glyphicon glyphicon-globe text-success"> <br></span><b>Location : </b><?php echo $profile_data['county'] ?><br>
                <span class="glyphicon glyphicon-picture"> <br></span><b>Website : </b><?php echo $profile_data['website'] ?><br>
            </div>
            <div class="col-md-7">
                <div class="row span3 well">
                    <b>Overview : </b><?php echo $profile_data['overview'] ?>
                </div>
            </div>

        </div>
    </div>
    <div class ="col-md-10">
        <div class="container-fluid">
            <br>
            <div class="col-md-2 ">
                <span class="label label-info ">Skills</span><br><br>
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
            <br>
            <div class="col-md-9 ">
                <span class="label label-info"></span><br><br>


                <?php
                $user_id = $profile_data['user_id'];
                $sql = mysql_query("SELECT * FROM `portfolio` WHERE user_id = '$user_id' AND removed =''");
                while ($row = mysql_fetch_array($sql)) {
                    echo "<table >";
                    //Not yet ready to be viewed on profiles//
                    // "<td><a href ='" . $row['location'] . "'><img src = '" . $row['location'] . "' class='img-thumbnail'></a>";//
                    echo "<td>";
                }
                ?>

            </div>

        </div>
    </div>




    <div class="col-md-9">



        <?php
    } else {
        header('location: index.php');
        exit();
    }
    ?>
</div>
</div>
</div>
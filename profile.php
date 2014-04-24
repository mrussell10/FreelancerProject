<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'address', 'town', 'county', 'overview', 'profile_pic', 'slideshow');
    ?>
    <div class="container">
        <div class="row">

            <div class="col-xs-11 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <?php echo '<img src = "', $profile_data['profile_pic'], '" alt=""  class="img-rounded img-responsive" >'; ?>


                        </div>


                        <h4>
                            <?php echo $profile_data ['username']; ?></h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->

                        <i class="glyphicon glyphicon-gift"></i>
                        <?php echo $profile_data ['overview']; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <?php
    $query = 'SELECT `skill_name` FROM `user_skills` WHERE user_id=' . $user_data['user_id'];
    $result = mysql_query($query) or die(mysql_error());

    echo "<table border=1 class=gridtable>";
    echo "<th> Skills: </th>";

    while ($row = mysql_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $row["skill_name"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <?php
} else {
    header('location: index.php');
    exit();
}
?>
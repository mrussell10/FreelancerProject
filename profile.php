<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'address', 'town', 'county', 'overview', 'profile_pic','slideshow');
    ?>

    <div id="w">
        <div id="content" class="clearfix">
            <div id="userphoto"><?php echo '<img src = "', $profile_data['profile_pic'], '" alt="">'; ?></div>

            <div id="profile_head">
                <?php echo $profile_data ['username']; ?>
            </div>

            <div id="bio">
                <?php echo $profile_data ['overview']; ?>
            </div>
            
            <div id="user_widget">
                <?php echo $profile_data ['slideshow']; ?>
            </div>
            <p>
              
      
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
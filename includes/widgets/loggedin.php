

<div class="widget">
    <h2>Hello,

        <?php
        echo $user_data['first_name'];
        $username = $user_data['username'];
//Finds the messages that read is null//
        $sql = mysql_query("SELECT to_user FROM messages WHERE to_user = '$username' AND read_message=''");
//Counts the messages//
        $sql_count = MYSQL_NUMROWS($sql);


        ///Checks to see if the user logged in is a freelancer///
        $result = mysql_query("SELECT * FROM users WHERE `user_type` = 'freelancer' AND `username` ='$username'");
        if ($result && mysql_num_rows($result) > 0) {
            echo "<div class=inner>";
            echo "<ul>";
            echo "<li>";
            echo "<a href = view_jobs.php>View Jobs</a>";
            echo "</li>";
            echo "</ul>";
            echo "</div>";
            ///If they are not a freelancer , the post_job page is made available///       
        } else {
            echo "<div class=inner>";
            echo "<ul>";
            echo "<li>";
            echo "<a href = post_job.php>Post Job</a>";
            echo "</li>";
            echo "</ul>";
            echo "</div>";
        }
        ?>


        <div class="inner">

            <ul>
                <li>
                    <a href ="<?php echo $user_data['username']; ?>">Profile</a>
                </li>
                <li>
                    <a href = "settings.php">Settings</a>
                </li>
                <li>
                    <a href = "inbox.php">Inbox (<?php echo $sql_count; ?>)</a>
                </li>
                <li>
                    <a href = "logout.php">Log Out</a>
                </li>
            </ul>
        </div>
</div>







<body>
    <div class="list-group">
        
        <p class="text-center">

            <?php
            echo $user_data['first_name'];
            $username = $user_data['username'];
//Finds the messages that read is null//
            $sql = mysql_query("SELECT to_user FROM messages WHERE to_user = '$username' AND read_message=''");
//Counts the messages//
            $sql_count = MYSQL_NUMROWS($sql);

            //Finds the messages that read is null//
            $sql2 = mysql_query("SELECT * FROM job WHERE username = '$username' AND deleted='0'");
//Counts the messages//
            $sql_count_jobs = MYSQL_NUMROWS($sql2);
            ?>

            is logged in 

    </div>
    <div class="list-group">
        <div class="col-md-13">
            <span class="pull-right">
                <a href ="<?php echo $user_data['username']; ?>" class="list-group-item active">My Profile</a>
                <a href="view_jobs.php" class="list-group-item">View Jobs</a>
                <a href="post_job.php" class="list-group-item">Post a Job</a>
                <a href="my_jobs.php" class="list-group-item">My Jobs</a>
                <a href="settings.php" class="list-group-item">Edit Profile</a>
                <a href="inbox.php" class="list-group-item">View Inbox</a>
                <a href="logout.php" class="list-group-item">Log Out</a>
            </span>
        </div>
    </div>







</body>

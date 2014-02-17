<div class="widget">
<h2>Hello,

<?php
echo $user_data['first_name'];
$username = $user_data['username'];
//Finds the messages that read is null//
$sql = mysql_query("SELECT to_user FROM messages WHERE to_user = '$username' AND read_message=''");
//Counts the messages//
$sql_count = MYSQL_NUMROWS($sql);
?>
    
        <div class="inner">
            <div class="profile_pic">
           
        <ul>
            <li>
            <a href ="<?php echo $user_data['username']; ?>">Profile</a>
            </li>
             <li>
            <a href = "settings.php">Settings</a>
            </li>
             <li>
            <a href = "post_job.php">Post Job</a>
            </li>
            <li>
            <a href = "view_jobs.php">View Jobs</a>
            </li>
            <li>
            <a href = "inbox.php">Inbox  (<?php echo $sql_count; ?>)</a>
            </li>
            <li>
            <a href = "logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</div>
        
   


    
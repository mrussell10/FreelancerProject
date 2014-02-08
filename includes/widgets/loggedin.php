<div class="widget">
<h2>Hello,

<?php
echo $user_data['first_name']
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
            <a href = "post_job.php">Post Job</a>
            </li>
            <li>
            <a href = "view_jobs.php">View Jobs</a>
            </li>
            <li>
            <a href = "inbox.php">Inbox</a>
            </li>
            <li>
            <a href = "logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</div>
        
   


    

<body>
    <div class="list-group">

        <p class="text-center">

            <?php
            echo $user_data['first_name'];
            $username = $user_data['username'];
//Finds the messages that read is null//
            $sql = mysql_query("SELECT to_user FROM messages WHERE to_user = '$username' AND (read_message='' AND deleted='')");
//Counts the messages//
            $new_message = MYSQL_NUMROWS($sql);
            ?>

            is logged in 

    </div>
 
   
        <div class="col-md-2 pull-right">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                            </span>Profile</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-eye-open text-primary"></span><a href='<?php echo $user_data['username']?>'>View Profile</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="edit_profile.php">Edit Profile</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-info"></span><a href="my_skills.php">Edit Skills</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-success"></span><a href="my_portfolio.php">Edit Portfolio</a>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Jobs</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="my_jobs.php">Manage Jobs</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="view_jobs.php">Find a Job</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="post_job.php">Post a Job</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="view_freelancers.php">Find a Freelancer</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-envelope">
                            </span>Messaging</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="inbox.php">Inbox </a> <span class="label label-info"><?php echo $new_message ?></span>
                                    </td>
                                </tr>
                                
                            </table>
                            
                        </div>
                        
                    </div>
                </div>
                     <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="logout.php">
                                </span><a href="logout.php">Log Out</a>
                        </h4>
                    </div>
                </div>
                
        </div>
   








</body>

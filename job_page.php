<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<body>


    <div class = "col-md-11">

        <hgroup class = "mb20">
            <h1>Job Information</h1>
            <h2 class = "lead"><strong class = "text-danger">Please</strong> apply using the <strong class = "text-danger">cover letter</strong></h2>
        </hgroup>

        <section class = "col-xs-12 col-sm-6 col-md-12">
            <article class = "search-result row">
                <div class = "col-xs-12 col-sm-12 col-md-3">
                    <a href = "#" title = "Lorem ipsum" class = "thumbnail"> <?php
                        $job_id = $_REQUEST['job_id'];
                        $job_query = mysql_query("SELECT * FROM job where job_id = $job_id") or die(mysql_error());
                        while ($row = mysql_fetch_array($job_query)) {
                            echo "<img src='" . $row['image'] . "' />";
                        }
                        ?></a>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-2">
                    <ul class = "meta-search">
                        <li><i class = "glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class = "glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class = "glyphicon glyphicon-tags"></i> <span> <?php
                                $job_id = $_REQUEST['job_id'];
                                $job_query = mysql_query("SELECT * FROM job where job_id = $job_id") or die(mysql_error());
                                while ($row3 = mysql_fetch_array($job_query)) {
                                    echo $row3['job_type'];
                                }
                                ?></span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3><a href="#" title=""> <?php
                            $job_id = $_REQUEST['job_id'];
                            $job_query = mysql_query("SELECT * FROM job where job_id = $job_id") or die(mysql_error());
                            while ($row3 = mysql_fetch_array($job_query)) {
                                echo $row3['description'];
                            }
                            ?></a></h3>
                    <p> <?php
                        $job_id = $_REQUEST['job_id'];
                        $job_query = mysql_query("SELECT * FROM job where job_id = $job_id") or die(mysql_error());
                        while ($row3 = mysql_fetch_array($job_query)) {
                            echo $row3['instructions'];
                        }
                        ?>
                    </p>						

                </div>
                <span class="clearfix borda"></span>
            </article>




        </section>
    </div>
    <div class="container">

        <div class="row text-center">
            <h3>Interested ?</h3>
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Click to apply</a>
        </div>


        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Application Form</h3>

                        <form method="POST" action="" >
                            <h3>Cover :</h3>
                            <TEXTAREA NAME="pm" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA><br> 
<input type="submit" value="submit" name="submit" />
</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</table>
<br>



    <?php
    $sender = $user_data['username'];
//Selecting the username from the job database that corresponds with the job id//
    $username_query = mysql_query("SELECT * FROM job where job_id = $job_id");
    while ($row = mysql_fetch_array($username_query)) {

        $to_user = $row['username'];
        $title = $row['description'];
    }


    $from_user = $user_data['username'];


//Declaring the variable for the cover letter//
    $pm = $_POST['pm'];

//If the cover letter is empty//
    if (empty($pm) === true) {
        
    } else
        $insert = "INSERT INTO messages(from_user,to_user,message,title)
VALUES
('" . $from_user . "','" . $to_user . "','" . $pm . "','" . $title . "')";

//declare in the order variable
    $result = mysql_query($insert); //order executes
    if ($result) {
        echo("<div class='alert alert-success'><center><h5><b>Success!!</b> Your cover letter has been sent</h5></center></div>");
    }
    ?>

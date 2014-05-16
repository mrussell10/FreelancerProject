<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>
<body>


    <div class = "col-md-10">

        <hgroup class = "mb20">
            <h3>Job Information</h3>
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






        </section>
    </div>
    <div class="container ">
<div class="col-md-3 col-md-offset-4">
        <div class="row text-center">
            <h3>Click below to apply </h3>
            <a href="#" class="btn  btn-primary" data-toggle="modal" data-target="#basicModal">Apply</a>
        </div>
</div>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Application Form</h4>
                    </div>
                    <div class="modal-body">


                        <form method="POST" action="" >
                            <h3>Cover Letter :</h3>
                            <TEXTAREA NAME="pm" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA><br> 
<input type="submit" class="btn btn-primary"value="Send" name="submit" />
</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div>
            </div>
        </div>
    </div>

</table>
<br>



    <?php
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
    $update_bids = "UPDATE job SET bid = bid + 1 WHERE job_id = $job_id";
    $exc = mysql_query($update_bids); //order executes
//declare in the order variable
    $result = mysql_query($insert); //order executes
    if ($result) {
        $updated_rows = mysql_affected_rows();
        if ($updated_rows > 0) {
            echo '<script type="text/javascript">window.location.replace("successful_application.php");</script>';
        }
    }
    ?>

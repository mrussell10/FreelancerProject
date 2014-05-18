<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="post_job.php" data-toggle="validator">
                    <fieldset>
                        <legend class="text-center">Post a Job</legend>

                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Title of Job</label>
                            <div class="col-md-9">
                                <input id="name" name="description" type="text" placeholder="What are you looking for ?" class="form-control">
                            </div>
                        </div>
                    
                     

                        <!-- Budget input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="budget">Budget</label>
                            <div class="col-md-9">
                                <select class="form-control" name="budget">
                                    <option>< 50</option>
                                    <option>50 - 100</option>
                                    <option>150 - 200</option>
                                    <option>200 - 400</option>
                                    <option>400 - 600</option>
                                    <option>600 - 1000</option>
                                    <option>1000 +</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="job_type">Category</label>
                            <div class="col-md-9">
                                <select class="form-control" name="job_type">
                                    <option>Websites IT & Software</option>
                                    <option>Web Design</option>
                                    <option>Programming</option>
                                    <option>Design</option>
                                    <option>Mobile</option>
                                    <option>Writing</option>
                                    <option>Data Entry</option>
                                    <option>Repairs and Maintenance</option>
                                    <option>Advertising and Marketing</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Discription</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="instructions" placeholder="Please enter your message here..." rows="5"></textarea>
                            </div>
                        </div>



                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>


            <?php
            
            //Declaring variables//
            $instructions = mysql_real_escape_string($_POST["instructions"]);
            $image = $user_data['profile_pic'];
            $description = mysql_real_escape_string($_POST["description"]);
            $budget = mysql_real_escape_string($_POST["budget"]);
            $username = mysql_real_escape_string($user_data['username']);
            $job_type = mysql_real_escape_string($_POST["job_type"]);
            $user_id = mysql_real_escape_string($user_data['user_id']);


            if (empty($_POST['description'])) {
                echo "Please fill in your description !";
            } else {
                $sql = "INSERT INTO job(instructions,image,description,budget,username,job_type,user_id)
                          VALUES
                          ('" . $instructions . "','" . $image . "','" . $description . "','" . $budget . "','" . $username . "','" . $job_type . "','" . $user_id . "')";
            }

            //declare in the order variable
            $result = mysql_query($sql); //sql executes
            if ($result) {
                $updated_rows = mysql_affected_rows();
                if ($updated_rows > 0) {
                    echo '<script type="text/javascript">window.location.replace("successful_post.php");</script>';
                }
            }
            ?>
        </div>
        </body>
        </html>
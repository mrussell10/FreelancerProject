

<?php
include 'core/init.php';
include 'includes/overall/header.php';

$id = mysql_real_escape_string($_GET['user_id']);
$query = 'SELECT `username` FROM `users` WHERE `user_id` = ' . $id . ' LIMIT 1';
$result = mysql_query($query);
$row = mysql_fetch_array($result);

// Echo page content
echo $row['username'];
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
                        <!-- Image input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label"  for="image">Image</label>
                            <div class="col-md-9">
                                <input id="image" name="image" type="url" placeholder="Insert url here" class="form-control">
                            </div>
                        </div>

                        <!-- Email input-->
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
            
//inserting data order
            if (empty($_POST['description'])) {
                echo "Please fill in your description !";
            } else {
                $order = "INSERT INTO job(instructions,image,description,budget,username,job_type,user_id)
VALUES
('" . $_POST["instructions"] . "','" . $_POST["image"] . "','" . $_POST["description"] . "','" . $_POST["budget"] . "','" . $user_data['username'] . "','" . $_POST['job_type'] . "','" . $user_data['user_id'] . "')";
            }

//declare in the order variable
            $result = mysql_query($order); //order executes
            if ($result) {
                echo("<br>Job posted successfully");
            }
            ?>
        </div>
        </body>
        </html>
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


<!-- we will create registration.php after registration.html -->


<form method="post" action="post_job.php">
    
    <div>
        <h1>Post a Job</h1>
          <span id="form_text">Subject</span>
        
        <label><input id="input_box" type="text" name="description" size="40"></label>
        <br>
        
        <label>
        <span id="form_text">Description</span>
        <textarea id="textbox" name="instructions"></textarea>
        </label>

           
        <span id="form_text">Budget</span>
        
        <label><input id="input_box" type="text" name="budget" size="40"></label>
        <br>

        <span id="form_text"> Category </span>
        <label><input id="input_box" type="text" name="job_type" size="40"></label>

        <br>
        <input type="submit" name="submit" value="Sent">
 

        <?php
//inserting data order
        if (empty($_POST['description'])) {
            echo "Please fill in your description !";
        } else {
            $order = "INSERT INTO job(instructions,description,budget,username,job_type,user_id)
VALUES
('" . $_POST["instructions"] . "','" . $_POST["description"] . "','" . $_POST["budget"] . "','" . $user_data['username'] . "','" . $_POST['job_type'] . "','" . $user_data['user_id'] . "')";
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
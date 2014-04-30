<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<html>
    <head>


    </head>
    <style>
        button {
            color:black;
        }
    </style>


    <body>
        <div class="col-md-11">   
            <div class="widget stacked widget-table action-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>Inbox</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Title</th>
                                <th>Message</th>



                                <th class="td-actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $message_id = $_REQUEST['message_id'];

                            ;
                            $update_read = mysql_query("UPDATE messages SET read_message = 'yes' WHERE message_id = $message_id") or die(mysql_error());

                            $job_query = mysql_query("SELECT * FROM messages where message_id = $message_id") or die(mysql_error());
                            while ($row3 = mysql_fetch_array($job_query)) {


                                echo "<td>" . $row3['from_user'] . "</td>";
                                echo "<td>" . $row3['title'] . "</td>";
                                echo "<td>" . $row3['message'] . "</td>";
                                echo"<label for='del'>Male</label>";
                                $to_user = $row3['from_user'];
                                $title = $row3['title'];
                            }
                            ?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->
            <div>

                <br>

                <form method="POST" action="" >

                    <label class="col-md-6 control-label" for="message">Reply</label>
                    <textarea class="form-control" NAME="pm" cols="1" rows="4"></TEXTAREA><br> 
<div class="pull-right">
<input class="btn btn-primary" onclick="return confirm('are you sure you want to send ?')" type="submit" value="submit" name="submit" />
</div>
</form>


                <?php
                $from_user = $user_data['username'];


//Declaring the variable for the cover letter//
                $pm = $_POST['pm'];

//If the cover letter is empty//
                if (empty($pm) === true) {
                    echo "Please fill in the message";
                } else
                    $order = "INSERT INTO messages(from_user,to_user,message,title)
VALUES
('" . $from_user . "','" . $to_user . "','" . $pm . "','" . $title . "')";

//declare in the order variable
                $result = mysql_query($order); //order executes
                if ($result) {
                    echo("<br>Your message has been sucessfuly sent");
                }
                ?>






</body>
</html>
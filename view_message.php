<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
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

        <div class="col-md-9">   
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $message_id = $_REQUEST['message_id'];


                            $update_read = mysql_query("UPDATE messages SET read_message = 'yes' WHERE message_id = $message_id") or die(mysql_error());

                            $job_query = mysql_query("SELECT * FROM messages where message_id = $message_id") or die(mysql_error());
                            while ($row3 = mysql_fetch_array($job_query)) {

                                $to_user = $row3['from_user'];
                                $title = $row3['title'];
                                $sender = $row3['to_user'];

                                if ($username != $sender) {

                                    echo 'You cannot view this message';
                                    header('Location: protected.php');
                                } else {

                                    echo "<td>" . $row3['from_user'] . "</td>";
                                    echo "<td>" . $row3['title'] . "</td>";
                                    echo "<td>" . $row3['message'] . "</td>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->
            <div>

                <br>

                <form method="POST" action="" >


                    <div class ="col-md-6">
                        <label class="col-md-6" for="message">Reply</label>
                        <textarea class="form-control" NAME="pm" ></textarea><br> 
                        <input class="btn btn-primary" onclick="return confirm('are you sure you want to send ?')" type="submit" value="submit" name="submit" />
                    </div>


                </form>   




                <?php
                $from_user = $user_data['username'];


                //Declaring the variable for the cover letter//
                $pm = mysql_real_escape_string($_POST['pm']);

                //If the cover letter is empty//
                if (empty($pm) === true) {
                    
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
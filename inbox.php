<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();

?>


<html>
    <head>


    </head>



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
                                <th>Name</th>
                                <th>Subject</th>

                                <th>Date</th>
                                <th>Actions</th>
                                <th></th>
                                <th></th>

                                <th class="td-actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = $user_data['username'];

                            //Queries the database for messages that have not been deleted or read//
                            $query = mysql_query("SELECT * FROM messages WHERE to_user = '$user' AND (read_message='' AND deleted='') ") or die(mysql_error());

                            while ($row2 = mysql_fetch_array($query)) {
                                echo "<td>" . $row2['from_user'] . "</td>";
                                echo "<td>Re : " . $row2['title'] . "</td>";
                                echo "<td>" . $row2['date'] . "</td>";
                                //Displays a hyperlink to bring the user the view_message page //
                                echo "<td>" . '<a href="view_message.php?message_id=' . $row2['message_id'] . '">View Message</a>' . "</td>";
                                //Displays a button to show the user that the message is new//
                                echo "<td><span class='label label-success'>New</span></td>";
                                echo "<td>" . '<form method="post"> <button onclick="return confirm(\'are you sure you would like to delete this message ? \');"class="btn-xs btn-danger"  type="submit" name="del" value="' . $row2["message_id"] . '" /> Delete </button></form>' . "<td>";
                                echo "<tr>";


                                if (isset($_POST['del'])) {


                                    $id = $_POST['del'];

                                    $query2 = mysql_query("UPDATE messages SET deleted='1'
                                WHERE message_id ='$id'") or die(mysql_error());
                                }
                            }
                            ?>
                            <?php
                            $user = $user_data['username'];

                            $query = mysql_query("SELECT * FROM messages WHERE to_user = '$user' AND (read_message='yes' AND deleted=''); ") or die(mysql_error());
                            while ($row2 = mysql_fetch_array($query)) {
                                echo "<td>" . $row2['from_user'] . "</td>";
                                echo "<td>Re : " . $row2['title'] . "</td>";
                                echo "<td>" . $row2['date'] . "</td>";
                                echo "<td>" . '<a href="view_message.php?message_id=' . $row2['message_id'] . '">View Message</a>' . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . '<form method="post"> <button onclick="return confirm(\'are you sure you would like to delete this message ? \');"   class="btn-xs btn-danger"  type="submit" name="del" value="' . $row2["message_id"] . '" /> Delete </button></form>' . "<td>";
                                echo "<tr>";
                                if (isset($_POST['del'])) {

                                    $id = $_POST['del'];


                                    $sql = mysql_query("UPDATE messages SET deleted='1'
                                                        WHERE message_id ='$id'") or die(mysql_error());
                                    echo '<script type="text/javascript">window.location.replace("edit_profile.php");</script>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->
            <div>



                <tbody>

                </tbody>
                </table>




                </body>
                </html>
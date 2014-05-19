<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>


<html>
    <head>

    </head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <style>
        button{
            color:blue;
        }
    </style>





    <body>
        <div class="col-md-9">   
            <div class="widget stacked widget-table action-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>Manage your listed jobs</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Budget</th>
                                <th>Manage</th>
                                <th class="td-actions"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //Display jobs that are currently available
                            $query = mysql_query("SELECT * FROM job WHERE username ='$username' AND deleted =''") or die(mysql_error());
                            while ($row2 = mysql_fetch_array($query)) {

                                echo "<td>" . $row2["description"] . "</td>";
                                echo "<td>" . $row2["budget"] . "</td>";

                                $row2["job_id"];

                                //Adds the delete button to the form//
                                echo "<td>" . '<form method="post"> <button class="btn-xs btn-danger" type="submit" onclick="return confirm(\'are you sure you would like to delete this job? \');"name="del" value="' . $row2["job_id"] . '" />Delete </button> </form>' . "<td>";

                                echo "</tr>";

                                // Deletes the entry from showing on the site//
                                if (isset($_POST['del'])) {


                                    $id = $_POST['del'];

                                    $query2 = mysql_query("UPDATE job SET deleted='1'
                                WHERE job_id ='$id'") or die(mysql_error());
                                    echo '<script type="text/javascript">window.location.replace("my_jobs.php");</script>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->
            <div>



                </body>

                </html>

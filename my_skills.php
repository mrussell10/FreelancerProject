<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<html>
    <head>


    </head>



    <body>

        <div class="col-md-11">   
            <div class="widget stacked widget-table action-table">
                <div class="col-md-6">
                    <form role="form" class="form-inline" method="post">
                        <div class="form-group">

                            <input type="text" name="skill" class="form-control" id="skill" placeholder="Enter skill">


                            <button type="submit" class="btn btn-default">Add</button>
                    </form>

                    <div class="widget-header">
                        <i class="icon-th-list"></i>
                        <h3>My Skills</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Skill Name</th>
                                    <th>action</th>


                                    <th class="td-actions"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $u_id = $user_data['user_id'];

                                //Queries the database for messages that have not been deleted or read//
                                $query = mysql_query("SELECT * FROM user_skills WHERE user_id = '$u_id' AND removed='' ") or die(mysql_error());

                                while ($row2 = mysql_fetch_array($query)) {
                                    echo "<td>" . $row2['skill_name'] . "</td>";
                                    echo "<td>" . '<form method="post"> <button onclick="return confirm(\'are you sure you would like to delete this message ? \');"class="btn-xs btn-danger"  type="submit" name="del" value="' . $row2["skill_id"] . '" /> Delete </button></form>' . "<td>";
                                    echo "<tr>";


                                    if (isset($_POST['del'])) {


                                        $skill_id = $_POST['del'];

                                        $query2 = mysql_query("UPDATE user_skills SET removed='1'
                                    WHERE skill_id ='$skill_id'") or die(mysql_error());
                                    }
                                }
                                ?>


                            <div>



                                <tbody>

                                </tbody>
                        </table>




                        </body>

                        <?php
                        $skill = $_REQUEST['skill'];


                        if (empty($skill) === true) {
                            
                        } else
                            $sql = "INSERT INTO `user_skills`(`skill_name`, `user_id`) VALUES ('$skill','$u_id')";
                            $excecute = mysql_query($sql);
                        ?>



                        </html>
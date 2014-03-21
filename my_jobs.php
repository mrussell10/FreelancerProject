<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>


<html>
    <head>
        <link href="css/FooTable-2/css/footable.core.css" rel="stylesheet" type="text/css" />
        <link href="css/FooTable-2/css/footable.metro.css" rel="stylesheet" type="text/css" />

    </head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="css/FooTable-2/js/footable.js" type="text/javascript"></script>
    <script src="css/FooTable-2/js/footable.filter.js" type="text/javascript"></script>
    <script src="css/FooTable-2/js/footable.sort.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {

            $('.footable').footable();

        });
    </script>

    <h1> Manage your jobs </h1>

    <body>
        <div>
            search:<input id="filter" type="text" /> 

            <p>
            <form action="" method="post">
                <table data-filter="#filter" class="footable">
                    <thead>
                        <tr>
                            <th data-class="expand">
                                Posted by 
                            </th>
                            <th data-class="expand">
                                Description
                            </th>

                            <th data-class="expand" data-hide="phone,tablet">
                                Skills
                            </th>

                            <th data-class="expand" data-sort-initial="true">
                                Budget
                            </th>


                            <th data-class="expand" >
                                Manage
                            </th>




                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $query = mysql_query("SELECT * FROM job WHERE username ='$username' AND deleted ='0'") or die(mysql_error());
                        while ($row2 = mysql_fetch_array($query)) {

                            echo "<td>" . $row2["username"] . "</td>";
                            echo "<td>" . $row2["description"] . "</td>";
                            echo "<td>" . $row2["skill_type"] . "</td>";
                            echo "<td>" . $row2["job_id"] . "</td>";

                            //Adds the delete button to the form//
                            echo "<td>" . '<form method="post"> <button type="submit" name="del" value="' . $row2["job_id"] . '" />Delete </button> </form>' . "<td>";

                            echo "</tr>";

                            // Deletes the entry from showing on the site//
                            if (isset($_POST['del'])) {


                                $id = $_POST['del'];

                                $query2 = mysql_query("UPDATE job SET deleted='1'
                                WHERE job_id ='$id'") or die(mysql_error());
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </form>
        </table>
    </div>




</body>

</html>

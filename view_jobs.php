<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>

<style>
    
    .widget{
        display:none;
    }
</style>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Description</th>
                    <th>Skill Type</th>
                    <th>Budget</th>
                    <th>More Information</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX">
                    <?php
                    $query = mysql_query("SELECT * FROM job") or die(mysql_error());
                    while ($row2 = mysql_fetch_array($query)) {

                        echo "<td>" . $row2["username"] . "</td>";
                        echo "<td>" . $row2["description"] . "</td>";
                        echo "<td>" . $row2["skill_type"] . "</td>";
                        echo "<td>" . $row2["budget"] . "</td>";
                        echo "<td>" . '<a href="job_page.php?job_id=' . $row2['job_id'] . '">More Information</a>' . "</td>";
                        echo "</tr>";
                     }
                    ?>


            </tbody>
        </table>

    </table>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $("#example").dataTable();
        })
    </script>



</body>

</html>

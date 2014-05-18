<?php
include 'core/init.php';
include 'includes/overall/header.php';


?>
<style>
    
</style>

<html>
    <head>

    </head>



    <style>
     
    </style>
</head>
<body>
    <div class="col-md-10">
        <table id="mytable" class="table table-striped">
            <thead>
                <tr class="warning">
                    <th scope="col" >Image</th>
                    <th scope="col">Listed by</th>
                    <th scope="col">Description</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Date Placed</th>
                    <th scope="col">Budget</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php
                ///Updated query to not show deleted jobs//
                $query = mysql_query("SELECT * FROM job WHERE deleted ='0'") or die(mysql_error());
                while ($row = mysql_fetch_array($query)) {
                    echo "<td >" . "<img src='" . $row['image'] . "' height='60' width='60' class='img-thumbnail'/>" . "</td>";
                    echo "<td >" . $row["username"] . "</td>";
                    echo "<td>". $row["description"] ."</td>";
                    echo "<td>"."<b>" . $row["job_type"] . "</b>"."</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>"."€ " . $row["budget"]."</td>";
                    echo "<td>"."<b>" . '<a href="job_page.php?job_id=' . $row['job_id'] . '">Apply </a>' . "</b>"."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="css/bootstrap/js/jquery.filtertable.min.js"></script>
        <script>
            $(document).ready(function() {
                $('table').filterTable();
            });
        </script>
</body>
</html>
<!-- Placed at the end of the document so the pages load faster -->










</html>

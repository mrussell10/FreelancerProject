<?php
include 'core/init.php';
include 'includes/overall/header.php';

?>
<html>
    <head>

    </head>



    <style>
        
    </style>
</head>
<body>
    <div class="col-md-10">
        <table id="mytable" class="table table-striped table-hover">
            <thead>
                <tr class="warning">
                    <th scope="col" ></th>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Overview</th>
                   <th scope="col">Role</th>
                    <th scope="col">Rate</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php
                ///Updated query to not show deleted jobs//
                $query = mysql_query("SELECT * FROM users") or die(mysql_error());
                while ($row = mysql_fetch_array($query)) {
                    echo "<td >" . "<img src='" . $row['profile_pic'] . "' height='60' width='60' />" . "</td>";
                    echo "<td >" . $row["username"] . "</td>";
                    echo "<td>" . $row["overview"] . "</td>";
                    echo "<td>". "<b>". $row["area"] ."</b>". "</td>";
                    echo "<td>". "<b>"."$ ". $row["rate"] ." P/hour"."</b>". "</td>";
                    echo "<td>"  . '<a href="' . $row['username'] . '">View Profile </a>'. "</b>" . "</td>";
                   
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

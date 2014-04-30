<?php
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();
?>


<html>
    <head>

    </head>



    <style>
        /* generic table styling */
        table { border-collapse: collapse; width:100%; }
        th, td { padding: 5px; }


        td { border-bottom: 1px solid #ccc; }

        /* filter-table specific styling */
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
    </style>
</head>
<body>
    <div class="col-md-10">


        <table>
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Listed by</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Date Placed</th>
                    <th scope="col">Budget</th>

                </tr>
            </thead>
            <tbody>

                <?php
                ///Updated query to not show deleted jobs//
                $query = mysql_query("SELECT * FROM job WHERE deleted ='0'") or die(mysql_error());
                while ($row = mysql_fetch_array($query)) {
                    echo "<td>" . "<img src='" . $row['image'] . "' height='60' width='60' />" . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["budget"] . " €" . "</td>";
                    echo "<td>" . '<a href="job_page.php?job_id=' . $row['job_id'] . '">View More Information </a>' . "</td>";
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

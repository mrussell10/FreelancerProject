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
    

    <body>
        <div>
        search:<input id="filter" type="text" /> e.g. username , job type
        
        <p>

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
                    
                    <th data-class="expand" data-hide="phone,tablet">
                      Job Application
                    </th>


                </tr>
            </thead>
            <tbody>


                <?php
                ///Updated query to not show deleted jobs//
                $query = mysql_query("SELECT * FROM job WHERE deleted ='0'") or die(mysql_error());
                while ($row2 = mysql_fetch_array($query)) {

                    echo "<td>" . $row2["username"] . "</td>";
                    echo "<td>" . $row2["description"] . "</td>";
                    echo "<td>" . $row2["skill_type"] . "</td>";
                    echo "<td>" . $row2["budget"] . "</td>";
                    echo "<td>" . '<a href="job_page.php?job_id=' . $row2['job_id'] . '">apply </a>' . "</td>";
                    echo "</tr>";
                }
                ?>


            </tbody>
        </table>

    </table>
    </div>




</body>

</html>

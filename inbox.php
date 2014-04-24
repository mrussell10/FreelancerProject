<?php
include 'core/init.php';
include 'includes/overall/header.php';
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
        search:<input id="filter" type="text" /> e.g. username
        
        <table data-filter="#filter" class="footable">
            <thead>
                <tr>
                    <th data-class="expand">
                        Name
                    </th>
                    <th data-class="expand">
                        Subject
                    </th>
                    <th data-hide="phone,tablet">
                        
                    </th>
                    <th data-class="expand" data-sort-initial="true">
                        Date
                    </th>
                    <th data-class="expand" data-sort-initial="true">
                        Status
                    </th>

                </tr>
            </thead>
            <tbody>
            <?php
            $user = $user_data['username'];

            $query = mysql_query("SELECT * FROM messages WHERE to_user = '$user' ") or die(mysql_error());
            while ($row2 = mysql_fetch_array($query)) {
                echo "<td>" . $row2['from_user'] . "</td>";
                echo "<td>Re : " . $row2['title'] . "</td>";
                echo "<td>" . '<a href="view_message.php?message_id=' . $row2['message_id'] . '">View Message</a>' . "</td>";
                echo "<td>" . $row2['date'] . "</td>";
                echo "<td>" . $row2['read_message'] . "</td>";
                echo "<tr>";
                }
            ?>
        </tbody>
    </table>




</body>
</html>
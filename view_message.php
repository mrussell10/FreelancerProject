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

    <script type="text/javascript">
        $(function() {

            $('.footable').footable();

        });
    </script>

    <body>


        <table data-filter="#filter" class="footable">
            <thead>
                <tr>
                    <th data-class="expand">
                        From
                    </th>
                    <th data-class="expand">
                        Title
                    </th>

                    <th data-class="expand" data-sort-initial="true">
                        Message
                    </th>
                    <th data-class="expand" data-sort-initial="true">
                        Manage
                    </th>


                </tr>
            </thead>
            <tbody>


                <?php
                $message_id = $_REQUEST['message_id'];

                ;
                $update_read = mysql_query("UPDATE messages SET read_message = 'yes' WHERE message_id = $message_id") or die(mysql_error());

                $job_query = mysql_query("SELECT * FROM messages where message_id = $message_id") or die(mysql_error());
                while ($row3 = mysql_fetch_array($job_query)) {


                echo "<td>" . $row3['from_user'] . "</td>";
                echo "<td>" . $row3['title'] . "</td>";
                echo "<td>" . $row3['message'] . "</td>";
                echo"<label for='del'>Male</label>";
                echo "<td>" . '<form method="post"> <button  type="submit" name="del" value="' . $row3["message_id"] . '" /> Delete </button></form>' . "<td>";

                $to_user = $row3['from_user'];
                $title = $row3['title'];

                if (isset($_POST['del'])) {


                $id = $_POST['del'];

                $query2 = mysql_query("UPDATE messages SET deleted='1'
                                WHERE message_id ='$id'") or die(mysql_error());
                }
                }
                
                ?>
            </tbody>
        </table>
        <br>
        <form method="POST" action="" >
            <h1>Reply :</h1>
            <TEXTAREA NAME="pm" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA><br> 
<input type="submit" value="submit" name="submit" />
</form>


        <?php
        $sender = $user_data['username'];
//Selecting the username from the job database that corresponds with the job id//
        $username_query = mysql_query("SELECT * FROM job where job_id = $job_id");
        while ($row = mysql_fetch_array($username_query)) {

            $to_user = $row['username'];
            $title = $row['description'];
        }


        $from_user = $user_data['username'];


//Declaring the variable for the cover letter//
        $pm = $_POST['pm'];

//If the cover letter is empty//
        if (empty($pm) === true) {
            echo "Please fill in the message";
        } else
            $order = "INSERT INTO messages(from_user,to_user,message,title)
VALUES
('" . $from_user . "','" . $to_user . "','" . $pm . "','" . $title . "')";

//declare in the order variable
        $result = mysql_query($order); //order executes
        if ($result) {
            echo("<br>Your message has been sucessfuly sent");
        }
        ?>






</body>
</html>
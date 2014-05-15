<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<html>
    <style>
        .img-circle{
            height : 140px;
            width: 140px
        }
    </style>

    <body>

        <form role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input name="image" type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </body>

    <div class="col-md-8">   

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>My Portfolio</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>action</th>


                        <th class="td-actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $u_id = $user_data['user_id'];

                    //Queries the database for messages that have not been deleted or read//
                    $query = mysql_query("SELECT * FROM portfolio WHERE user_id = '$u_id' AND removed='' ") or die(mysql_error());

                    while ($row = mysql_fetch_array($query)) {
                        echo "<td>" . "<img src='" . $row['location'] . "' class ='img-circle' />" . "</td>";
                        echo "<td>" . '<form method="post"> <button onclick="return confirm(\'are you sure you would like to delete this image ? \');"class="btn-xs btn-danger"  type="submit" name="del" value="' . $row["photo_id"] . '" /> Delete </button></form>' . "<td>";
                        echo "<tr>";


                        if (isset($_POST['del'])) {


                            $photo_id = $_POST['del'];

                            $sql = mysql_query("UPDATE portfolio SET removed='1'
                                    WHERE photo_id ='$photo_id'") or die(mysql_error());
                       
                                    echo '<script type="text/javascript">window.location.replace("my_portfolio.php");</script>';
                                }
                            }
                        
                    
                    ?>


                <div>



                    <tbody>

                    </tbody>
            </table>




            </body>


            </html>
            <?php
            if (!isset($_FILES['image']['tmp_name'])) {
                echo "";
            } else {
                $file = $_FILES['image']['tmp_name'];
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $image_name = addslashes($_FILES['image']['name']);

                move_uploaded_file($_FILES["image"]["tmp_name"], "images/portfolio/" . $_FILES["image"]["name"]);

                $location = "images/portfolio/" . $_FILES["image"]["name"];
                $u_id = $user_data['user_id'];
                $username = $user_data['username'];
                $save = mysql_query("INSERT INTO portfolio (location, user_id) VALUES ('$location','$u_id')");

                exit();
            }
            ?>
            
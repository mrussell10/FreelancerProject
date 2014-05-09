<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<html>

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

    $save = mysql_query("INSERT INTO portfolio (location, user_id) VALUES ('$location','$u_id')");
    header("location: my_portfolio.php");
    exit();
}
?>

<?php
$id = $user_data['user_id'];
$image_query = mysql_query("SELECT * FROM portfolio where user_id = '$id'") or die(mysql_error());
while ($row = mysql_fetch_array($image_query)) {
   echo "<img src='" . $row['location'] . "' />";
}
?>
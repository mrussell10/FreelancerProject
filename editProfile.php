<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<title>REGISTRATION FORM</title>
<body>

    <form name="registration" method="post" action="editProfile.php">
        <!-- we will create registration.php after registration.html -->
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
//if submit is not blanked i.e. it is clicked.
    If (isset($_REQUEST['submit']) != '') {
        If ($_REQUEST['username'] == '') {
            Echo "please fill the empty field.";
        } Else {
            $sql = "insert into users(username) values('" . $_REQUEST['username'] . "')";
            $res = mysql_query($sql);
            If ($res) {
                Echo "Record updated";
            } Else {
                Echo "There is some problem updating record";
            }
        }
    }
    ($_SESSION['username'])
    ?>	


    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
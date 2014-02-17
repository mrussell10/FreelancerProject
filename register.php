<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<title>REGISTRATION FORM</title>
<body>

    <form name="registration" method="post" >
        <!-- we will create registration.php after registration.html -->
        <ul class="formFields">
            <li>
           

            <li>
             Username* :  <input type="text" name="username" value=""></li>
            <li>
            <td>Password: <input type="text" name="password" value=""></li>
            <li>
            <td>Email*:  <input type="text" name="email" value=""></li>
            <li>
                <input type="submit" value="submit" name="submit"/>
            </form>

                <?php
//if submit is not blanked i.e. it is clicked.
                If (isset($_REQUEST['submit']) != '') {
                    If ($_REQUEST['username'] == '' || $_REQUEST['email'] == '' || $_REQUEST['password'] == '') {
                        Echo "please fill the empty field.";
                    } Else {
                        $sql = "insert into users(username,email,password) values('" . $_REQUEST['username'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "')";
                        $res = mysql_query($sql);
                        If ($res) {
                            Echo "You have successfully registered";
                        } Else {
                            Echo "There is some problem in inserting record";
                        }
                    }
                }
                ?>	


                <script type="text/javascript" src="js/script.js"></script>
                </body>
                </html>
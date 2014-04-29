<?php
include 'core/init.php';
include 'includes/head.php';
include 'includes/menu.php';
?>

<div class="container">

    <div class="row">
        <div class="col-xs-1 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" method="post">
                <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="Username" tabindex="3">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                         
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                      
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" name="submit"class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>
                    </div>
            </form>
        </div>
    </div>
    <!-- Modal -->


</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<body>



    <?php
    //Checks if the username field is set //
    if (isset($_POST['username'])) {
        $username_entry = $_POST['username'];
        //Queries the database for the username that has been set//
        $query_user = mysql_query("SELECT COUNT(username) FROM users WHERE username = '$username_entry'") or die(mysql_error());
        $count = mysql_fetch_array($query_user);
        //Counts the number of times the username is in the database//
        $username_count = $count[0];
        if ($username_count > 0)
            echo 'The username is already taken please choose another';
        else {
            If (isset($_REQUEST['submit']) != '') {
                If ($_REQUEST['first_name'] == '' || $_REQUEST['last_name'] == '' || $_REQUEST['username'] == '' || $_REQUEST['email'] == '' || $_REQUEST['password'] == '') {
                    Echo "please fill the empty field.";
                } Else {
                    $sql = "insert into users(first_name,last_name,username,email,password)values('" . $_REQUEST['first_name'] . "', '" . $_REQUEST['last_name'] . "', '" . $_REQUEST['username'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "')";
                    $res = mysql_query($sql);

                    If ($res) {
                        Echo "You have successfully registered";
                    } Else {
                        Echo "There is some problem in inserting record";
                    }
                }
            }
        }
    }
    ?>	



</body>
</html>
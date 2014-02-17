<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<style>


    input[type="submit"] {
        border: 3px solid #006;
        background: #9cf;
        width:80px;
    }

    input
    {
        width:300px;
        display:block;
        border: 1px solid #999;
        height: 25px;
    }

    input[id="rate"]
    {
        width:50px;
        display:block;
        border: 1px solid #999;
        height: 25px;

    }
    select
    {
        width:90px;
        display:block;
        border: 1px solid #999;
        height: 25px;

    }


</style>

<title>REGISTRATION FORM</title>
<body>

    <form name="registration" method="post" >
        <!-- we will create registration.php after registration.html -->
        <label>
            <span> Username : </span> <input type="text" name="username" id="username">
        </label>

        <label>
            <span> Password:</span> <input type="text" name="password" id="password">
        </label>

        <label>
            <span> Email*:</span>  <input type="text" name="email" id="email">
        </label>

        <label>
            <span> Hourly Rate: </span> <select name="rate" id="rat">
                <option value="5.00">€5.00</option>
                <option value="10.00">€10.00</option>
                <option value="15.00">€15.00</option>
                <option value="20.00">€20.00</option>
                <option value="30.00">€30.00</option>
                <option value="40.00">€40.00</option>
                <option value="50.00">€50.00</option>
            </select>
        </label>

        <label>
            <span>Website: </span> <input type="text" name="website" id="website">
        </label>

        <label>
            <span> Address:  </span><input type="text" name="address" id="address">
        </label>

        <label>
            <span>Town:  </span><input type="text" name="town" id="town">
        </label>

        <label>
            <span> County: </span> <select name="county" id="county">
                <option value="Dublin">Dublin</option>
                <option value="Cork">Cork</option>
            </select>
        </label>
        <br></br>
        <input type="submit" value="submit" name="submit" id="submit"/>
    </form>

    <?php
//if submit is not blanked i.e. it is clicked.
    If (isset($_REQUEST['submit']) != '') {
        If ($_REQUEST['username'] == '' || $_REQUEST['email'] == '' || $_REQUEST['password'] == '' || $_REQUEST['rate'] == '' || $_REQUEST['website'] == '' || $_REQUEST['address'] == '' || $_REQUEST['town'] == '' || $_REQUEST['county'] == '') {
            Echo "please fill the empty field.";
        } Else {
            $sql = "insert into users(username,email,password,rate,website,address,town,county,user_type) values('" . $_REQUEST['username'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "', '" . $_REQUEST['rate'] . "', '" . $_REQUEST['website'] . "', '" . $_REQUEST['address'] . "', '" . $_REQUEST['town'] . "', '" . $_REQUEST['county'] . "', 'freelancer')";
            $res = mysql_query($sql);
            If ($res) {
                Echo "You have successfully registered";
            } Else {
                Echo "There is some problem in inserting record";
            }
        }
    }
    ?>	



</body>
</html>
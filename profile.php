<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'address', 'town', 'county', 'overview', 'profile_pic');
    ?>


    <table class="styletable">
        <th><?php echo $username ?></th>
        <th>About Me : </th>
        <tr>

            <td><?php echo '<img src = "', $profile_data['profile_pic'], '" alt="">'; ?>

            <td><?php echo $profile_data ['overview']; ?></td>
        <tr>
            <th>Name : </th>
            <td><?php echo $profile_data ['first_name']; ?>
                <?php echo $profile_data ['last_name']; ?></td>
        <tr>
            <th>Email : </th>
            <td><?php echo $profile_data ['email']; ?></td>
        </tr>
        <tr>
            <th>Address : </th>
            <td><?php echo $profile_data ['address']; ?></td>
        </tr>
        <tr>
            <th>Town : </th>
            <td><?php echo $profile_data ['town']; ?></td>
        </tr>
        <tr>
            <th>County : </th>
            <td><?php echo $profile_data ['county']; ?></td>
        </tr>
        <tr></tr>


    </tr>
    </table>
    <br>
    <?php
    $query = 'SELECT `skill_name` FROM `user_skills` WHERE user_id=' . $user_data['user_id'];
    $result = mysql_query($query) or die(mysql_error());

    echo "<table border=1 class=gridtable>";
    echo "<th> Skills: </th>";

    while ($row = mysql_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $row["skill_name"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <?php
} else {
    header('location: index.php');
    exit();
}
?>
<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    $user_id = user_id_from_username($username);
    $profile_data = user_data($user_id, 'username', 'first_name', 'last_name', 'email', 'address', 'town', 'county');
    ?>

    <h1><?php echo $profile_data ['username']; ?>  </h1>
    <table class="imagetable">
        <tr>
            <td>Name : </tb>
            <td><?php echo $profile_data ['first_name']; ?></td>
            <td><?php echo $profile_data ['last_name']; ?></td>
        <tr>
            <td>Email : </td>
            <td><?php echo $profile_data ['email']; ?></td>
        </tr>
        <tr>
            <td>Address : </td>
            <td><?php echo $profile_data ['address']; ?></td>
        </tr>
        <tr>
            <td>Town : </td>
            <td><?php echo $profile_data ['town']; ?></td>
        </tr>
        <tr>
            <td>County : </td>
            <td><?php echo $profile_data ['county']; ?></td>
        </tr>

    </table>
    <br>
    <?php
    
    
    
    $query = 'SELECT `skill_name` FROM `user_skills` WHERE user_id=' . $user_data['user_id'];
    $result = mysql_query($query) or die(mysql_error());
    
    echo "<table border=1 class=imagetable>"; 
    echo "<td> Skills: </td>";
    
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
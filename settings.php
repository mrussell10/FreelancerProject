<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>


<form name="settings" method="POST">
    Email : <input type="text" name="email" value="" />
    <input type="submit" value="update" />
</form>

<?php


$email = $_REQUEST['email'];


if (empty($email) === true){
    echo "fill email data to update";
}
else
   $sql = mysql_query("UPDATE users SET email = '$email' WHERE username = '$username'");
   

   //declare in the order variable


?>

   <div class="profile_pic">
            <?php
            
            if (isset($_FILES['profile_pic'])=== true){
                if (empty($_FILES['profile_pic']['name']) === true){
                    echo "Please choose a file";
                }
                else {
                    $allowed = array ('jpg','jpeg','gif','png');
                    
                    $file_name = $_FILES['profile_pic']['name'];
                    $file_extn = strtolower(end (explode('.',$file_name)));
                    $file_temp = $_FILES['profile_pic']['tmp_name'];
                    
                    if(in_array($file_extn, $allowed)=== true){
                        
                        change_profile_image($session_user_id,$file_temp,$file_extn);
                    }else{
                        echo "Incorrect file type";
                    }
                }
            }
            if (empty($user_data['profile_pic']) === false) {

             echo '<img src = "', $user_data['profile_pic'], '" alt="">';
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="profile_pic"/>
                <input type="submit"/>
            </form>



        </div>
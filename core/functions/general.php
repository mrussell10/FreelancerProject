<?php

function protect_page (){
    
    if (logged_in()===false){
        
        header('location: protected.php');
        exit();
}

}

?>

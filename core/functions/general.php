<?php

function protect_page (){
    
    if (client_check()===false){
        
        header('location: protected.php');
        exit();
}
}

?>

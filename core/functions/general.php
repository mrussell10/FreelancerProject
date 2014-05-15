<?php

// function to send user to protection page //
function protect_page() {
// If they are not logged in //
    if (logged_in() === false) {
// send them to protected.php //
        header('location: protected.php');
        exit();
    }
}

function cannot_register(){
    if (logged_in() === true) {
// send them to protected.php //
        header('location: index.php');
}
}
?>

<?php
    // delete the session info and redirect to login.php
    
    // remove all session variables
    // session_unset(); 

    // destroy the session 
    session_destroy(); 

    header('Location: login.php'); 





?>

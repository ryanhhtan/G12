<?php
    //Start the session
    session_start();

    //Include config file

    require_once("config.php");

    //clear session data
    session_unset(); 
    session_destroy(); 
    header('location:' .HOMEURL);
?>

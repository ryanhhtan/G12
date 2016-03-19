<?php
    //Start the session
    session_start();

    //Include config file

    require_once("config.php");

    //Include functions file
    require_once("functions.php");

    //clear session data
    logout();
    header('location:' .HOMEURL);
?>

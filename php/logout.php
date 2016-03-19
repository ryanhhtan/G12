<?php

    //Start the session
    session_start();

    //Include config file

    require_once("config.php");

    //Include functions file
    require_once("functions.php");

    //clear session data
    logout();

    //redirect to home page
    header('location:' .HOMEURL); 
    exit;
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Servival Guide for International Students </title>
		<link href="../style/base.css" rel="stylesheet" type="text/css">
        <link href="../style/homepage.css" rel="stylesheet" type="text/css">
        <link href="../style/comment.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../scripts/addheaderfooter_jquery.js"></script>

	</head>
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header"></div>
		
		<!--conten-->
		<div id="content">
		</div>

		
		<div id="footer"></div>	
	</body>


</html>
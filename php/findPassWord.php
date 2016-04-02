<?php
    //Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //Include database config
    require_once("config.php");

    //Include components;
    require_once("components.php");

    //Include functions;
    require_once("functions.php");

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
        <script src="../scripts/popupForms.js"></script>

	</head>
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header"></div>
		
		<!--conten-->
		<div id="content">
        <h1>Feature is coming soon...</h1>
		</div>

		
		<div id="footer"></div>	
	</body>


</html>
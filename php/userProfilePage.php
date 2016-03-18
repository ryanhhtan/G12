<?php
    //Start session
    session_start();

    //Include database configure
    require_once("config.php");

    //Include components
    require_once("components.php");

    //Include control functions
    require_once("functions.php");
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Retrive register data from request (POST)
        
    }

?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Servival Guide for International Students </title>
		<link href="../style/base.css" rel="stylesheet" type="text/css">
        <link href="../style/homepage.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../scripts/addheaderfooter_jquery.js"></script>
        <script src="../scripts/registerFormValidation.js"></script>

	</head>
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header"></div>
		
		<!--conten-->
		<div id="content">
            <h1>User Profile</h1>
		</div>

		
		<div id="footer"></div>	
	</body>


</html>
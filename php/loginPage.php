<?php
    //Start session
    session_start();

    //Include database config
    require_once("config.php");

    //Include components;
    require_once("components.php");

    //Include functions;
    require_once("functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userName = sanitizeInput($_POST['userName']);
        $password = sanitizeInput($_POST['password']);

        if (validateLoginParam($userName, $password)){
            if (login($userName, $password)){
             header('location:' . HOMEURL);   
            }
        }
    }

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
		<?php
        loadLoginForm("", "visible");
        ?>>
		</div>

		
		<div id="footer"></div>	
	</body>


</html>
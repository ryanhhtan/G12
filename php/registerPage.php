<?php
    //Use output buffer mode
    ob_start();

    //Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //Include database configure
    require_once("config.php");

    //Include components
    require_once("components.php");

    //Include control functions
    require_once("functions.php");
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Retrive register data from request (POST)
            $userName = sanitizeInput($_POST["userName"]);
            $password = sanitizeInput($_POST["password"]);
            $confirmPassword = sanitizeInput($_POST["confirmPassword"]);
            $email = sanitizeInput($_POST["email"]);

            if (validateRegisterParam($userName, $password, $confirmPassword, $email)) {
                dbAddAccount($userName, $password, $email);
                header('location:' . 'loginPage.php');
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
		<?php
        loadRegisterForm();
        ?>>
		</div>

		
		<div id="footer"></div>	
	</body>


</html>

<?php
// end output buffering and send our HTML to the browser as a whole
ob_end_flush();
?>
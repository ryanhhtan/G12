<?php
    //Use output buffer mode
    ob_start();

    //Start session
    session_start();

    //Include database config
    require_once("php/config.php");

    //Include components;
    require_once("php/components.php");

    //Include functions;
    require_once("php/functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userName = sanitizeInput($_POST['userName']);
        $password = sanitizeInput($_POST['password']);

        if (validateLoginParam($userName, $password)){
            login($userName, $password);
            
        } else {
            $loginPaneVisibility = "visible";
        }
    }

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Servival Guide for International Students </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style/homepage.css" rel="stylesheet" type="text/css">
        <link href="style/base.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="scripts/addheaderfooter_jquery.js"></script>
        <script src="scripts/popupForms.js"></script>


	</head>
	
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header">
        </div>
		
		<!--conten-->
        <div id="picture">
        <h1>Survival Guide</h1>
        </div>
		<div id="content">
            <!--
			<div id="slogan"><p>Our Slogan</p></div> 
            -->
			<div id="galleriesarea">
				<div id="studygallery" class="galleries">
                    <h2>School Info</h2>
					<a href="html/schools.html" title="Study information section">
					<img id="schoolPhotos" title="schools" src="images/BCIT/bcit.jpg" alt="study information picture">
					</a>
                    
				</div>
				<div id="livinggallery" class="galleries">
                    <h2>Living Info</h2>
					<a href="html/livingHomepage.html" title="Living information section">
					<img id="livingPhotos" title="living info" src="images/Entertainment/entertainment.jpg" alt="living information picture">
					</a>
				</div>
			</div>
		</div>

		
		<script src="scripts/switchphotos.js"></script>

        <div class="hidden">
        <?php
            loadLoginForm($mask, $loginPaneVisibility);
        ?>
        </div>

		<div id="footer">

        </div>	
	</body>


</html>

<?php
// end output buffering and send our HTML to the browser as a whole
ob_end_flush();
?>
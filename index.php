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
		<title>Vancouver Guide</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style/homepage.css" rel="stylesheet" type="text/css">
        <link href="style/base.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="scripts/addheaderfooter_jquery.js"></script>
        <script src="scripts/popupForms.js"></script>
        <script src="scripts/slidepicture.js"></script>
        <!--
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		-->

	</head>
	
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header">
        </div>
		<div id="slide">
			<div id="switchPicture">
			<ul id="pictureContainner">
				<li>
					<img src="images/v51.jpg" alt="slider1">
				</li>
				<li>
					<img src="images/v61.jpg" alt="slider2">
				</li>
				<li>
					<img src="images/v7.jpg" alt="slider3">
				</li>
			</ul>
			</div>
			<div id="switchLeft">
			<<<
			</div>
			<div id="switchRight">
			>>>
			</div>
		</div>
		<div id="content">
			<div id="galleriesarea">
				<div id="studygallery" class="galleries1">
                    <h2>School Information</h2>
					<a href="html/schools.html" title="Study information section">
					<img id="schoolPhotos" title="schools" src="images/BCIT/bcit.jpg" alt="study information picture">
					</a>
				</div>
                <div id="galleryText">
                <h1><span id="gquout">“</span>Do better choice!</h1>
                    <div id="bt1"><a href="../html/schools.html" title="Schools Info"><button type="button" class="bt1">Get Start</button></a></div>
                 </div>
			</div>

            <div id="livingpart">
                	<div id="livinggallery" class="galleries">
                        <h2>Living Information</h2>
					    <a href="html/livingHomepage.html" title="Living information section">
					    <img id="livingPhotos" title="living info" src="images/Entertainment/entertainment.jpg" alt="living information picture">
					    </a>
				   </div>
                   <div id="livingpartText">
                       <h1><span id="lquote">“</span>Find the most intresting things in this city!</h1>
                           <div id="bt2">
                               <a href="../html/livingHomepage.html" title="Schools Info">
                                   <button type="button" class="bt2">Get Start</button>
                               </a>
                           </div>
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
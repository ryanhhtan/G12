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
		
		<!--conten-->
        <!--_____________________LANDING PAGE SLIDER___________________________________-->
        <!--
	<div id="myCarousel" class="carousel slide" class="over" data-ride="carousel">
			<ol class="carousel-indicators">
					<li data-target="myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="myCarousel" data-slide-to="1"></li>
					<li data-target="myCarousel" data-slide-to="2"></li>
			</ol>


		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="images/stanly.jpg" alt="slider1" class="img-responsive" style="width:100%; height: 800px">
			</div>

			<div class="item">
				<img src="images/bridge.jpg" alt="slider2" class="img-responsive" style="width:100%; height: 800px">
			</div>

			<div class="item">
				<img src="images/victoria.jpg" alt="slider3" class="img-responsive" style="width:100%; height: 800px">
			</div>
		</div>

		<a class="carousel-control left" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>

		<script>$('.carousel').carousel({
        interval: 4000, //changes the speed
        pause: 'none' //removes mouseover pause
			})
		</script>
	</div>
	-->

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
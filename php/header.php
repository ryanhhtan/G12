<?php
    //Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //Include components
    require_once('components.php');
    require_once('config.php');
    require_once('functions.php');

?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../scripts/nav_jquery.js"></script>
		<!--header with logo, navigation-->
		<div id="header">
			<!--logo-->
			<div id="logo">
			<a href="../index.php"><img src="../images/LOGO1.jpg" title="logo" alt="Logo" style="height: 100px"></a>
			</div>
           <div id="loginbar">
            <?php 
                if(!isLogedIn()) {
                   echo '<a id="loginLink" href="../php/loginPage.php">Login</a>';
                   echo '<a id="registerlink" href="../php/registerPage.php">Register</a>';
                } else {
                    echo '<a href="../php/userProfilePage.php?queryUser=' . $_SESSION['SESS_USER_NAME'] . '">' .$_SESSION['SESS_USER_NAME'] .'</a>';
                    echo '<a href="../php/logout.php">Logout</a>';
                }           
                ?>           
            </div>
			<!--navigation bar, fixed at the top-->
			<div id="navigation">
				<div id="menubar">
					<ul id="mainmenu">
						<li id="homepage"><a href="../index.php" title="homepage">Home</a></li>
						<li id="studyinfomenu"><a href="../html/schools.html" title="Schools Info">Study</a></li>
						<li id="livinginfomenu"><a href="../html/livingHomepage.html" title="Schools Info">Living</a></li>
						<li id="interactingmenu"><a href="../html/contact.html" title="Contact us">Contact</a></li>
                        <li id="aboutmenu"><a href="../html/about.html" title="about">About Us</a></li>
						<li id="sitemapmenu"><a href="../php/comment.php" title="Post a comment">Comments</a></li>
					</ul>
				</div>
			</div>
		</div>

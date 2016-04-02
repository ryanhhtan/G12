<?php
    //Start session
    session_start();

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
			<a href="../index.php"><img src="../images/logo.png" title="logo" alt="Logo" style="width: 100px; height: 100px"></a>
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
						<li id="interactingmenu">Contact</li>
                        <li id="aboutmenu"><a href="../html/about.html" title="about">About Us</a></li>
						<li id="sitemapmenu"><a href="../html/sitemap.html" title="sitemap">Sitemap</a></li>
					</ul>
				</div>
				

				<div id="menuitemarea">
					<div id="studyinfo" class="menuitems">
						<ul class="submenu">
							<li><a href="../html/BCIT.html">BCIT</a></li>
							<li><a href="../html/UBC.html">UBC</a></li>
							<li><a href="../html/SFU.html">SFU</a></li>
							<li><a href="../html/Langara.html">Langara</a></li>
                            <li><a href="../html/ContactSchool.html">Contact Schools</a></li>
						</ul>
					</div>
					<div id="livinginfo" class="menuitems">
						<ul  class="submenu">
                            <li><a href="../html/Immigration.html" title="Immigration & Taxes">Immigration</a></li>
							<li><a href="../html/sightView.html" title="Sight Viewing">Sight Viewing</a></li>
							<li><a href="../html/entertaiment.html" title="Entertainment">Entertainment</a></li>
							<li><a href="../html/healthinsurance.html" title="Health Insurance">Health</a></li>
                        </ul>
					</div>
					<div id="interaction" class="menuitems">
						<ul  class="submenu">
							<li><a href="../html/contact.html" title="Contact us">Contact Us</a></li>
                            <li><a href="../php/comment.php" title="Post a comment">Comments</a></li>
						</ul>
					</div>			
				</div>

			</div>
		</div>

<?php
    //Start session
    session_start();

    //Include database configure
    require_once("config.php");
    require_once("components.php");
    require_once("functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
         $action= ($_POST['action']);
        switch ($action) {
            case 'login':
                $userName = sanitizeInput($_POST['userName']);
                $password = sanitizeInput($_POST['password']);

                if (validateLoginParam($userName, $password)){
                     login($userName, $password);
                } else {
                    $loginPaneVisibility = "visible";
                }
 
            break;

            case 'postNew':
                $topic = sanitizeInput($_POST['topic']);
                $comment = sanitizeInput($_POST['comment']);

                if (validatePostNewParam($topic, $comment) && isLogedIn()) {
                    dbAddTopic($_SESSION['SESS_USER_NAME'], $topic, $comment);
                } else {
                    $postNewVisibility = "visible";
                }

            break;

            case 'replyPost':
                $currentPostId = sanitizeInput($_POST['postId']);
                $comment = sanitizeInput($_POST['comment']);
                if($comment != "") {
                    dbAddReply($currentPostId, $comment);
                } else {
                    $hintComment = "*Comment cannot be empty.";
                    $replyPostVisibility = "visible";
                }
            break;

            default:
            break;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $currentPostId = sanitizeInput($_GET['postId']);
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
        <script src="../scripts/postFormValidation.js"></script>
	</head>
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header"></div>
		
		<!--conten-->
		<div id="content">
        <div id="picture">
        <!--<img src="images/bannerhome.jpg" alt="banner">-->
        </div>
            <div id="posts">
                <div id="topics">
                    <?php
                     loadTopicTable();   
                    ?>
                    </div>
                <div id="postDetails">
                    <?php
                        loadPostDetails($currentPostId);
                    ?>
                     </div>
                </div>
	
		</div>

        <div id="popup">
                <?php
                    if (isLogedIn()) {
                        loadNewPostPane($postNewVisibility);
                        loadReplyPostPane($replyPostVisibility);
                    } else {
                      loadLoginForm($mask, $loginPaneVisibility);  
                    }                    
                ?>
            </div>
		
		<div id="footer"></div>	
	</body>


</html>
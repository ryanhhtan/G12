<?php
session_start();

require_once("config.php"); 

//Define variables to hold register data
$userName = $password = $confirmPassword = $email = "";
$mask = "mask";
$replyPostVisibility = "hidden";
$postNewVisibility = "hidden";
$loginPaneVisibility = "hidden";

$hintUserName = "*";
$hintPassword = "*";
$hintConfirmPassoword = "*";
$hintEmail = "*";
$hintTopic = "*";
$hintComment = "*";


 function loadMaskPane() {?>
         <div id="maskPane">
         </div>
 <?php }

function loadLoginForm($mask, $visibility) {?>
    <?php 
    $loginFormClass = $mask;
    if ($loginFormClass == "") {
     $loginFormClass = $visibility;   
    }
    else {
     $loginFormClass =  $loginFormClass. " " .$visibility;   
    } 
    ?>


    <div id="loginPane" class="<?php echo $loginFormClass?>">
        <div id="login">
            <input id="btnCloseLoginPane" class="closeButton" type="button" value="X">
            <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="userName">User name</label>
            <?php echo '<label class="hintInfo">'.$GLOBALS['hintUserName'].'</label>';?>

            <br>
            <input type="text" id="userName" name="userName" value="<?php echo $GLOBALS['userName'];?>">
            <br>
            <label for="password">Password</label>
            <?php echo '<label class="hintInfo">'.$GLOBALS['hintPassword'].'</label>';?>
            <br>
            <input type="password" id="password" name="password">
            <br>
            <input type="hidden" value="login" name="action">
            <input type="submit" value="Log in">                    
            </form>

            <p>Forget username/password? Find it <a href="/html/findPassWord.html">here</a></p>
            <p>No user name? please <a href="/php/registerPage.php">register</a> &nbsp; one.</p>
            </div>
        </div>
    
<?php }

function loadRegisterForm() {?>
                <div id="register">

                   <!-- <input id="btnCloseRegisterPane" type="button" value="X">-->
                    <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input id="btnCloseRegisterPane" class="closeButton" type="button" value="X">
                    <label for="userName">User name</label>
                    <label class="hintInfo"><?php echo $GLOBALS['hintUserName'];?></label>
                    <br>
                    <input type="text" id="userName" name="userName" value="<?php echo $GLOBALS['userName'];?>">
                    <br>
                    <label for="password">Password</label>
                    <label class="hintInfo"><?php echo $GLOBALS['hintPassword'];?></label>
                    <br>
                    <input type="password" id="password" name="password">
                    <br>
                    <label for="confirmPassword">Confirm password</label>
                    <label class="hintInfo"><?php echo $GLOBALS['hintConfirmPassoword'];?></label>
                    <br>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                    <br>
                    <label for="email">Email</label>
                    <label class="hintInfo"><?php echo $GLOBALS['hintEmail'];?></label>
                    <br>
                    <input type="text" id="email" name="email" value="<?php echo $GLOBALS['email'];?>">
                    <br>
                    <input type="hidden" value="register" name="action">
                    <input type="submit" value="Register">
                    </form>

                    </div>
    
<?php }
    
  function loadTopicTable() {?>
    <table id="topicTable">
        <tr>
            <th>Author</th>
            <th>Topic</th>
            <th>Post Time</th>
        </tr>
        <?php
            try {
              $conn = new PDO("mysql:host=" .DB_HOST ."; dbname=" .DB_DATABASE,DB_USER, DB_PASSWORD);  
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = "SELECT topic.id, username, topic, datetime FROM account, topic WHERE account.id=topic.userId ORDER BY topic.id DESC";
              foreach($conn->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td><a href="#">' .$row['username'] . '</a></td>';
                  echo '<td><a href="comment.php?postId=' . $row['id'] . '">' .$row['topic'] . '</a></td>';
                  echo '<td>' .$row['datetime'] .'</td>';
                  echo "</tr>";
              }
            } catch (PDOExpition $e) {
                 echo $sql . "<br>" .$e->getMessage();
            }
        ?>      
    </table>
    <br>
    <button id="btnNewPost">Add a new topic</button>
 <?php }
?>

 <?php
  function loadNewPostPane($visibility){?>
    <div id="newPostPane" class="popup <?php echo $visibility?>">

        <form id="newPostForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input id="btnCloseNewPostPane" class="closeButton" type="button" value="X">
        <label for="topic">Topic</label>
        <label class="hintInfo"><?php echo $GLOBALS['hintTopic'];?></label>
        <br>
        <input type="text" id="topic" name="topic">
        <br>
        <label for="newComment">Comment</label>
        <label class="hintInfo"><?php echo $GLOBALS['hintComment'];?></label>
        <br>
        <textarea id="newComment" cols="60" rows="10" name="comment"></textarea>
        <br>
        <input type="hidden" value="postNew" name="action">
        <input type="submit" value="Submit">
        </form>
    </div>
 <?php }
?>

<?php
    function loadReplyPostPane($visibility){ ?>
    <div id="replyPostPane" class="popup <?php echo $visibility?>">

        <form id="replyPostForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input id="btnCloseReplyPostPane" class="closeButton" type="button" value="X">
        <label>Your reply</label>
        <label class="hintInfo"><?php echo $GLOBALS['hintComment'];?></label>
        <br>
                <textarea id="newComment" cols="60" rows="10" name="comment"></textarea>
        <br>
        <input type="hidden" value="replyPost" name="action">
        <input type="hidden" value="<?php echo $GLOBALS[currentPostId]?>" name="postId">
        <input type="submit" value="Submit">
        </form>
        <br>
    </div>
 <?php
     } 
 ?>  

<?php
    function loadPostDetails($postId){ ?>
    <div class="postDetails">
            <?php
     try {
         $conn = new PDO("mysql:host=" .DB_HOST ."; dbname=" .DB_DATABASE, DB_USER, DB_PASSWORD);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT userName, topic, datetime, content FROM account, topic WHERE topic.id = '" . $postId . "' AND topic.userId = account.id";
         $stmt = $conn->query($sql);
         if ($stmt->rowCount() == 0 ) {
             echo '<div class="topic">' . 'Select a topic from the topic list to view details' . '</div><br>';
         } else {
             $result = $stmt->fetch();
             echo '<div class="topic"> Topic: ' . $result[topic] . '</div><br>';
             echo '<div class="topicDetails">';
             echo '<a href="#">' .$result['userName'] . '</a>  wrote at ' . $result['datetime'] . ': <br><br>';
             echo '<div class="postContent">' .$result['content'] .'</div>';
             echo '</div>';

             $sql = "SELECT userName, content FROM account, reply WHERE topicId='" . $postId . "' AND reply.userId = account.id" ;
             $stmt = $conn->query($sql);
             foreach($stmt->fetchAll() as $reply) {
             echo '<div class="topicDetails">';
             echo '<a href="#">' .$reply['userName'] . '</a>  reply at ' . $reply['datetime'] . ': <br><br>';
             echo '<div class="postContent">' .$reply['content'] .'</div>';
             echo '</div>';
             }

             echo '<button id="btnReplyPost">Reply to the topic...</button>';
         }

     } catch(PDOException $e) {
     echo $sql . "<br>" .$e->getMessage();
    }   

    ?>
        
    </div>


 <?php
     } 
 ?>  

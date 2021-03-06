<?php
    //Start session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //include database config
    require_once("config.php");

    //Include components;
    require_once("components.php");

    function validateLoginParam($userName, $password) {
        $validInput = TRUE;
        if ($userName == "") {
            $GLOBALS['hintUsername'] = "*User Name cannot be empty";
            $validInput = FALSE;
        }

        if ($password =="") {
            $GLOBALS['hintPassword'] = "*Password cannot be empty";
            $validInput = FALSE;            
        }

        return $validInput;
    }

    //Validate post new topic parameters
    function validatePostNewParam($topic, $comment){
        $validInput = TRUE;
        if ($topic == "") {
          $GLOBALS['hintTopic'] = "*Topic cannot be empty.";  
          $validInput = FALSE;
        }
        if ($comment == "") {
          $GLOBALS['hintComment'] = "*Comment cannot be empty.";  
          $validInput = FALSE;
        }
        return $validInput;
    }

    //Vaidate register parameters
    function validateRegisterParam($userName, $password, $confirmPassword, $email) {
        $validInput = TRUE;
        if ($userName == "") {
          $GLOBALS['hintUserName'] = "*User name cannot be empty.";  
          $validInput = FALSE;
        }
        if ($password == "") {
         $GLOBALS['hintPassword'] = "*Password cannot be empty.";
         $validInput = FALSE;   
        }
        if ($password != "" && $confirmPassword == "") {
         $GLOBALS['hintConfirmPassoword'] = "*confirm password cannot be empty" ;
         $validInput = FALSE; 
        }
        if ($password != $confirmPassword){
         $GLOBALS['hintConfirmPassword'] = "*Two entered password are not the same.";
         $validInput = FALSE;    
        }
        if ($email == "") {
         $GLOBALS['hintEmail'] = "*Two entered password are not the same.";
         $validInput = FALSE; 
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $GLOBALS['hintEmail'] = "*Invalid email address.";
         $validInput = FALSE;    
        }

        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
            //$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpasswd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT id FROM account WHERE userName='" .$userName ."'";
            $stmt = $conn->query($sql);
            if($stmt->rowCount() >0){
                $GLOBALS['hintUserName'] = "*User name already exist, choose other one.";
                $validInput = FALSE;  
                }

                $sql = "SELECT email FROM account WHERE email='" .$email ."'";
                $stmt = $conn->query($sql);
                if($stmt->rowCount() >0){
                    $GLOBALS['hintEmail'] = "*Email already exist. Please login with your user name.";
                    $validInput = FALSE;                         
                    }
        }catch (PDOException $e) {
                echo $sql . "<br>" .$e->getMessage();
            }

        $conn = null;
        return $validInput;
    }

    //Add account to the database
    function dbAddAccount($userName, $password, $email){
                $password = md5($password);
            try {
                $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
                //$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpasswd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $sql = "INSERT INTO account (userName, passwd, email) VALUES ('$userName',  '$password', '$email')";
                    $conn->exec($sql);
               
            }  catch (PDOException $e) {
                echo $sql . "<br>" .$e->getMessage();
            }

            $conn = null;

     }

     //Add new topic to database
      function dbAddTopic($userName, $topic, $comment) {
          try {
              $conn = new PDO("mysql:host=" . DB_HOST .";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT id FROM account WHERE userName = '" . $userName ."'";
              $stmt = $conn->query($sql);
              $result = $stmt->fetch();
              $userId = $result['id'];
              $now = date("d/m/y h:i:s"); 
              $sql = "INSERT INTO topic (userId, topic, content, datetime) VALUES ('$userId', '$topic', '$comment', '$now')";
              $conn->exec($sql);
              header('location:' . htmlspecialchars($_SERVER["PHP_SELF"]), ENT_QUOTES | ENT_HTML5);

          } catch (PDOException $e) {
              echo $sql . "<br>" .$e->getMessage();
          }
          $conn = null;
      }

    //Add new reply to database
    function dbAddReply($postId, $comment) {
        try {
            $conn = new PDO("mysql:host=" .DB_HOST .";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT id FROM topic WHERE id=" . $postId ;
            $stmt = $conn->query($sql);
            if ($stmt->rowCount() == 0) {
              echo 'No such topic, please refresh the topics and choose one to reply.';  
            } else {
                $userName = $_SESSION['SESS_USER_NAME'];
                $sql = "SELECT id FROM account WHERE userName='" . $userName ."'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() == 0) {
                    echo 'No user id found';
                    header('location:' .'loginPage.php');
                } else {
                    $result = $stmt->fetch();
                    $userId = $result['id'];
                    $now = date("d/m/y h:i:s"); 
                    $sql = "INSERT INTO reply (topicId, userId, content, datetime) VALUES ('$postId', '$userId', '$comment', '$now')";
                    $conn->exec($sql);

                }
            }
        } catch(PDOException $e){
            echo $sql . "<br>" .$e->getMessage();
        }
    }

     //Login
     function login($userName, $password){
         $password = md5($password);
            try {
                $conn = new PDO("mysql:host=" . DB_HOST .";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT userName, passwd FROM account WHERE userName='" .$userName ."' AND passwd='" .$password ."'";
                $stmt = $conn->query($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetch();
                
                if(strtolower($userName) == strtolower($result['userName']) && $password == $result['passwd']) {
                    //Login successfully
                    session_regenerate_id();
                    $_SESSION['SESS_USER_NAME'] = $result['userName'];
                    session_write_close();
                    return TRUE;
                } else {
                    //Login failed
                    $GLOBALS['hintUserName'] = "*Invalid user name or password. Try again.";
                    $GLOBALS['loginPaneVisibility'] = 'visible';
                    return FALSE;
                }
               
            } catch (PDOException $e){
                echo $sql . "<br>" .$e->getMessage();
                return FALSE;
            }
        }

    
    //Test input
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES | ENT_HTML5);
        return $data;
    }

    //Check Loginstate
    function isLogedIn() {
        return(isset($_SESSION['SESS_USER_NAME']) && (trim($_SESSION['SESS_USER_NAME']) != ''));
    }

    function logout() {
        session_unset(); 
        session_destroy(); 
    }

    function deregister($deregisterUser) {
        try {
                $conn = new PDO("mysql:host=" . DB_HOST .";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id FROM account WHERE userName='" . $deregisterUser . "'";
                $stmt = $conn->query($sql);
                $result = $stmt->fetch();
                $userId = $result['id'];
                //Delete all the replies the user posted.
                $sql = "DELETE FROM reply WHERE userId=" .$userId ;
                $conn->exec($sql);

                //Delete all the replies in the topic the user posted.
                $sql = "SELECT id FROM topic WHERE userId=" .$userId;
                $stmt = $conn->query($sql);
                foreach ($stmt->fetchAll() as $row){
                    $topicId = $row['id'];
                    $sql = "DELETE FROM reply WHERE topicId='" . $topicId ."'";
                    $conn->exec($sql);
                }

                //Delete all the topic the user posted.
                $sql = "DELETE FROM topic WHERE userId=" .$userId ;
                $conn->exec($sql);
                //Delete the user account
                $sql = "DELETE FROM account WHERE id=" .$userId ;
                $conn->exec($sql);
                logout();
                return TRUE;
            
        } catch (PDOException $e) {
          echo $sql . "<br>" .$e->getMessage();
          return FALSE;
        }
        return FALSE;
    }


?>

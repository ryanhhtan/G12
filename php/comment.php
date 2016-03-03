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
	</head>
	<!--content-->
	<body>
		<!--header with logo, navigation-->
		<div id="header"></div>
		
		<!--conten-->
		<div id="content">
			<div id="commentpage">
                <div id="commentlist">
                <?php                
                echo "<table>";
                echo "<tr><th>Author</th><th>Topic</th><th>Posted Time</th></tr>";
                class TableRows extends RecursiveIteratorIterator { 
                        function __construct($it) { 
                            parent::__construct($it, self::LEAVES_ONLY); 
                        }

                        function current() {
                            return "<td>" . parent::current(). "</td>";
                        }

                        function beginChildren() { 
                            echo "<tr>"; 
                        } 

                        function endChildren() { 
                            echo "</tr>" . "\n";
                        } 
                    } 

                $servername = "sql203.byethost9.com";
                $username = "b9_17390383";
                $password = "comp1536g12";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=b9_17390383_issg", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT author, topic, postTime FROM comments"); 
                    $stmt->execute();
                     // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";

                ?>
                    <div id="response">
                        <button>Add a new comment</button>
                        </div>
                </div>
                <div id="commentdetails">
                    <p>This is the demo of the content of the comment. but the function still needs to add later.</p>
                </div>


			</div>			
		</div>

		
		<div id="footer"></div>	
	</body>


</html>
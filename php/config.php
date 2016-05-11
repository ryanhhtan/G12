<?php
	/*Configure DB connection parameters according to the domain name of the website*/
    $server = $_SERVER['SERVER_NAME'];

    if ($server == "localhost") {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'comp153612');
    define('DB_PASSWORD', 'comp[]1536[]12');
    define('DB_DATABASE', 'comp153612');
    define('HOMEURL', 'http://localhost/G12/index.php');
    define('COMMENTURL', 'http://localhost/G12/php/comment.php');
    define('ROOT', 'http://localhost/G12/');

    }

    if ($server == "www.1536g12.byethost9.com") {
    define('DB_HOST', 'sql203.byethost9.com');
    define('DB_USER', 'b9_17390383');
    define('DB_PASSWORD', 'comp1536g12');
    define('DB_DATABASE', 'b9_17390383_issg');
    define('HOMEURL', 'http://www.1536g12.byethost9.com/index.php');
    define('COMMENTURL', 'http://www.1536g12.byethost9.com/php/comment.php');
    define('ROOT', 'http://www.1536g12.byethost9.com/');
    }

    if ($server == "students.bcitdev.com") {
    define('DB_HOST', 'bcitdevcom.ipagemysql.com');
    define('DB_USER', 'comp153612');
    define('DB_PASSWORD', 'comp[]1536[]12');
    define('DB_DATABASE', 'comp153612');
    define('HOMEURL', 'http://students.bcitdev.com/A00950721/G12/index.php');
    define('COMMENTURL', 'http://students.bcitdev.com/A00950721/G12/php/comment.php');
    define('ROOT', 'http://students.bcitdev.com/A00950721/G12/');
    }
?>

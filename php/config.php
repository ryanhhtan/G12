<?php
    $server = $_SERVER['SERVER_NAME'];

    if ($server == "localhost") {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'g12admin');
    define('DB_PASSWORD', 'comp1536g12');
    define('DB_DATABASE', 'myForum');
    define('HOMEURL', 'http://localhost:11111/index.php');
    define('COMMENTURL', 'http://localhost:11111/php/comment.php');

    }

    if ($server == "www.1536g12.byethost9.com") {
    define('DB_HOST', 'sql203.byethost9.com');
    define('DB_USER', 'b9_17390383');
    define('DB_PASSWORD', 'comp1536g12');
    define('DB_DATABASE', 'b9_17390383_issg');
    define('HOMEURL', 'http://www.1536g12.byethost9.com/index.php');
    define('COMMENTURL', 'http://www.1536g12.byethost9.com/php/comment.php');
    }

    if ($server == "students.bcitdev.com") {
    define('DB_HOST', 'bcitdevcom.ipagemysql.com');
    define('DB_USER', 'comp153612');
    define('DB_PASSWORD', 'comp[]1536[]12');
    define('DB_DATABASE', 'comp153612');
    define('HOMEURL', 'http://students.bcitdev.com/A00950721/G12/index.html');
    define('COMMENTURL', 'http://students.bcitdev.com/A00950721/G12/php/comment.php');
    }

    /*
    //bcitdev config
    define('DB_HOST', 'bcitdevcom.ipagemysql.com');
    define('DB_USER', 'comp153612');
    define('DB_PASSWORD', 'comp[]1536[]12');
    define('DB_DATABASE', 'comp153612');
    define('HOMEURL', 'http://students.bcitdev.com/A00950721/G12/index.html');
    define('COMMENTURL', 'http://students.bcitdev.com/A00950721/G12/php/comment.php');
    */

    /*
    //localhost configure
    define('DB_HOST', 'localhost');
    define('DB_USER', 'g12admin');
    define('DB_PASSWORD', 'comp1536g12');
    define('DB_DATABASE', 'myForum');
    define('HOMEURL', 'http://localhost:11111/index.php');
    define('COMMENTURL', 'http://localhost:11111/php/comment.php');

    */

    /*
    //byethost9.com configure
    define('DB_HOST', 'sql203.byethost9.com');
    define('DB_USER', 'b9_17390383');
    define('DB_PASSWORD', 'comp1536g12');
    define('DB_DATABASE', 'b9_17390383_issg');
    define('HOMEURL', 'http://www.1536g12.byethost9.com/index.php');
    define('COMMENTURL', 'http://www.1536g12.byethost9.com/php/comment.php');
    */  

?>

<?php 
    include '../../vars.php';
    $host = $SS_DB_HOST;
    $dbname = $SS_DB_NAME;
    $dbuser = $SS_DB_USER;
    $pass = $SS_DB_PASSWORD;

    try {
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);

        // VULNERABILTIY: The user input and the query should be sanitised before sending the request to the DB.
        $DBH->query("INSERT INTO forum (author, post) VALUES ('". $_POST['name'] ."','". $_POST['content'] ."');");

        $DBH = null;

    } catch(PDOException $e) {echo $e->getMessage();}  

    header("Location: index.php");
    die();
    
?>
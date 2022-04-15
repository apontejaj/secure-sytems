<?php 
    include '../../vars.php';

    try {
        $host = $SS_DB_HOST;
        $dbname = $SS_DB_NAME;
        $dbuser = $SS_DB_USER;
        $pass = $SS_DB_PASSWORD;
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);

        $sql = "INSERT INTO forum (author, post) VALUES (?, ?);";
        $sth = $DBH->prepare($sql);
		$sth->bindParam(1, htmlspecialchars($_POST['name']), PDO::PARAM_STR);
		$sth->bindParam(2, htmlspecialchars($_POST['content']), PDO::PARAM_STR);
		$sth->execute();

        $sth = null;
        $DBH = null;

    } catch(PDOException $e) {echo $e->getMessage();}  

    header("Location: index.php");
    die();
    
?>
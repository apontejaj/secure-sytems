<h1> hello </h1>


<?php 
    include '../vars.php';
    
    try {
        $host = $SS_DB_HOST;
        $dbname = $SS_DB_NAME;
        $dbuser = $SS_DB_USER;
        $pass = $SS_DB_PASSWORD;
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);

        // //Kill the connection with a KILL Statement.
        foreach ($DBH->query('select CONNECTION_ID()') as $thingy){
            echo $thingy['CONNECTION_ID()'];
        }
        // //Set the PDO object to NULL.
        // $DBH = null;

    } catch(PDOException $e) {echo 'Error';}  

    // $sql = "SELECT * FROM `switch` WHERE `user` = ?;";
    // $sth = $DBH->prepare($sql);

    // $sth->bindParam(1, $user, PDO::PARAM_INT);

    // $sth->execute();

    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // $allPorts = '{';
    // foreach($result as $item){
    //     $allPorts = $allPorts . '"port' . $item['port'] . '":"' . $item['status'] . '",';
    // }
    // $allPorts = $allPorts . '"coder":"amilcar"}';
    // echo $allPorts;

    // //$status = $result['status'];





?>
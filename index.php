<h1> hello </h1>


<?php 
    include 'vars.php';

    echo $SS_DB_HOST;




// try {
//     $host = 'apontejaj.com';
//     $dbname = 'switch';
//     $dbuser = 'root';
//     $pass = 'Pass1234!';
//     # MySQL with PDO_MYSQL
//     $DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
// } catch(PDOException $e) {echo 'Error';}  

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